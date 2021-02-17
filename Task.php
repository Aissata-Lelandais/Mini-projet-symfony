<?php
//src/Entity/Task.php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=TaskRepository::class)
 */
class Task
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     *@Assert\NotBlank
     *@ORM\Column(type="string" ,length=250)
     */
    public $task;
    /**
     ** @ORM\Column(type="date")
     *@Assert\NotBlank
     *@Assert\Type("\DateTime")
     */
    protected $dueDate;
}
