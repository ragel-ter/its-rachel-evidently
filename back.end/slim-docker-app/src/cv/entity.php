<?php

namespace App\Entities;

use App\Interfaces\CVInterface;

class CV implements CVInterface
{
    private $basicInfo;
    private $summary;
    private $skills;
    private $experience;
    private $education;
    private $projects;
    private $certifications;
    private $languages;
    private $links;

    public function __construct(array $data)
    {
        $this->basicInfo = $data['basic_info'] ?? [];
        $this->summary = $data['summary'] ?? '';
        $this->skills = $data['skills'] ?? [];
        $this->experience = $data['experience'] ?? [];
        $this->education = $data['education'] ?? [];
        $this->projects = $data['projects'] ?? [];
        $this->certifications = $data['certifications'] ?? [];
        $this->languages = $data['languages'] ?? [];
        $this->links = $data['links'] ?? [];
    }

    public function getBasicInfo(): array
    {
        return $this->basicInfo;
    }

    public function getSummary(): string
    {
        return $this->summary;
    }

    public function getSkills(): array
    {
        return $this->skills;
    }

    public function getExperience(): array
    {
        return $this->experience;
    }

    public function getEducation(): array
    {
        return $this->education;
    }

    public function getProjects(): array
    {
        return $this->projects;
    }

    public function getCertifications(): array
    {
        return $this->certifications;
    }

    public function getLanguages(): array
    {
        return $this->languages;
    }

    public function getLinks(): array
    {
        return $this->links;
    }
}
