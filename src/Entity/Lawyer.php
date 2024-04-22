<?php

namespace App\Entity;

use App\Repository\LawyerRepository;
use Doctrine\ORM\Mapping as ORM;



#[ORM\Entity(repositoryClass: LawyerRepository::class)]
class Lawyer extends User
{

}
