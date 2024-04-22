<?php

namespace App\Entity;

use App\Repository\JudgeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: JudgeRepository::class)]
class Judge extends User
{

}
