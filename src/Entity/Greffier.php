<?php

namespace App\Entity;

use App\Repository\GreffierRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GreffierRepository::class)]
class Greffier extends User
{

}
