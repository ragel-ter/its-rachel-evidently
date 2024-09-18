<?php

namespace App\Interfaces;

interface CVInterface
{
    public function getBasicInfo(): array;
    public function getSummary(): string;
    public function getSkills(): array;
    public function getExperience(): array;
    public function getEducation(): array;
    public function getProjects(): array;
    public function getCertifications(): array;
    public function getLanguages(): array;
    public function getLinks(): array;
}

interface CVRepositoryInterface {
    public function getAllCVs(): array;
    public function getCVById(int $id): ?CVInterface;
    public function createCV(array $data): CVInterface;
    public function updateCV(int $id, array $data): bool;
    public function deleteCV(int $id): bool;
}
