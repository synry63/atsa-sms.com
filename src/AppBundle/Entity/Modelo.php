<?php
/**
 * Created by PhpStorm.
 * User: patrici-star
 * Date: 12/24/2016
 * Time: 8:23 AM
 */
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="modelos")
 */
class Modelo
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * @ORM\Column(type="string", length=255)
     *
     * @var string
     */
    private $nombre;

    /**
     * @ORM\ManyToOne(targetEntity="Flota")
     * @ORM\JoinColumn(name="flota_id", referencedColumnName="id")
     */
    private $flota;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param string $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }



}