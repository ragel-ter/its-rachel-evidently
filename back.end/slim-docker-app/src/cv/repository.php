<?php

namespace App\Repositories;

use App\Interfaces\CVInterface;
use App\Interfaces\CVRepositoryInterface;
use PDO;

class CVRepository implements CVRepositoryInterface
{
    private $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getAllCVs(): array
    {
        $stmt = $this->db->query("SELECT * FROM cvs");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCVById(int $id): ?CVInterface
    {
        $stmt = $this->db->prepare("SELECT * FROM cvs WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $cv = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$cv) {
            return null;
        }

        // Assuming you have a CV class that implements CVInterface
        return new CV($cv);
    }

    public function createCV(array $data): CVInterface
    {
        $stmt = $this->db->prepare("INSERT INTO cvs (basic_info, summary, skills, experience, education, projects, certifications, languages, links) VALUES (:basic_info, :summary, :skills, :experience, :education, :projects, :certifications, :languages, :links)");
        
        $stmt->execute([
            'basic_info' => json_encode($data['basic_info']),
            'summary' => $data['summary'],
            'skills' => json_encode($data['skills']),
            'experience' => json_encode($data['experience']),
            'education' => json_encode($data['education']),
            'projects' => json_encode($data['projects']),
            'certifications' => json_encode($data['certifications']),
            'languages' => json_encode($data['languages']),
            'links' => json_encode($data['links'])
        ]);

        $id = $this->db->lastInsertId();
        return $this->getCVById($id);
    }

    public function updateCV(int $id, array $data): bool
    {
        $stmt = $this->db->prepare("UPDATE cvs SET basic_info = :basic_info, summary = :summary, skills = :skills, experience = :experience, education = :education, projects = :projects, certifications = :certifications, languages = :languages, links = :links WHERE id = :id");
        
        return $stmt->execute([
            'id' => $id,
            'basic_info' => json_encode($data['basic_info']),
            'summary' => $data['summary'],
            'skills' => json_encode($data['skills']),
            'experience' => json_encode($data['experience']),
            'education' => json_encode($data['education']),
            'projects' => json_encode($data['projects']),
            'certifications' => json_encode($data['certifications']),
            'languages' => json_encode($data['languages']),
            'links' => json_encode($data['links'])
        ]);
    }

    public function deleteCV(int $id): bool
    {
        $stmt = $this->db->prepare("DELETE FROM cvs WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}
