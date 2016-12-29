<?php
/**
 * Created by PhpStorm.
 * User: patrici-star
 * Date: 12/24/2016
 * Time: 8:23 AM
 */
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Type;

/**
 * @ORM\Entity
 * @ORM\Table(name="aros")
 */
class ARO
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * @ORM\OneToOne(targetEntity="Modelo")
     * @ORM\JoinColumn(name="modelo_id", referencedColumnName="id")
     */
    private $modelo;

    /**
     * @ORM\OneToOne(targetEntity="Aeronave")
     * @ORM\JoinColumn(name="aeronave_id", referencedColumnName="id")
     */
    private $aeronave;

    /**
     * @ORM\Column(type="datetime")
     * @Type("DateTime<'Y/m/d-H:m'>")
     * @var \DateTime
     */
    private $fecha;

    /**
     * @ORM\Column(type="string")
     */
    private $origen;

    /**
     * @ORM\Column(type="string")
     */
    private $destino;
    /**
     * @ORM\ManyToOne(targetEntity="Respuesta")
     * @ORM\JoinColumn(name="zona", referencedColumnName="id")
     */
    private $zona;
    /**
     * @ORM\ManyToOne(targetEntity="Respuesta")
     * @ORM\JoinColumn(name="mission", referencedColumnName="id")
     */
    private $mission;

    /**
     * @ORM\ManyToOne(targetEntity="Respuesta")
     * @ORM\JoinColumn(name="salud", referencedColumnName="id")
     */
    private $salud;

    /**
     * @ORM\ManyToOne(targetEntity="Respuesta")
     * @ORM\JoinColumn(name="situacion", referencedColumnName="id")
     */
    private $situacion;

    /**
     * @ORM\ManyToOne(targetEntity="Respuesta")
     * @ORM\JoinColumn(name="descanso", referencedColumnName="id")
     */
    private $descanso;

    /**
     * @ORM\ManyToOne(targetEntity="Respuesta")
     * @ORM\JoinColumn(name="planificar", referencedColumnName="id")
     */
    private $tiempoPlanificar;

    /**
     * @ORM\Column(type="string",nullable=true)
     */
    private $experienciaTripulacionPiloto;
    /**
     * @ORM\Column(type="string",nullable=true)
     */
    private $experienciaTripulacionCoPiloto;

    /**
     * @ORM\Column(type="string",nullable=true)
     */
    private $experienciaTripulacionRutaPiloto;
    /**
     * @ORM\Column(type="string",nullable=true)
     */
    private $experienciaTripulacionRutaCoPiloto;
    /**
     * @ORM\Column(type="string",nullable=true)
     */
    private $aerodromoOrigen;
    /**
     * @ORM\Column(type="string",nullable=true)
     */
    private $aerodromoDestino;
    /**
     * @ORM\Column(type="string",nullable=true)
     */
    private $meteorologiaOrigen;
    /**
     * @ORM\Column(type="string",nullable=true)
     */
    private $meteorologiaDestino;
    /**
     * @ORM\Column(type="string",nullable=true)
     */
    private $diferidos;

    /**
     * @ORM\Column(type="integer",nullable=true)
     */
    private $total;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="usuario_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @return mixed
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param mixed $total
     */
    public function setTotal($total)
    {
        $this->total = $total;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }


    /**
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getZona()
    {
        return $this->zona;
    }

    /**
     * @param mixed $zona
     */
    public function setZona($zona)
    {
        $this->zona = $zona;
    }

    /**
     * @return mixed
     */
    public function getTiempoPlanificar()
    {
        return $this->tiempoPlanificar;
    }

    /**
     * @param mixed $tiempoPlanificar
     */
    public function setTiempoPlanificar($tiempoPlanificar)
    {
        $this->tiempoPlanificar = $tiempoPlanificar;
    }

    /**
     * @return mixed
     */
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * @param mixed $modelo
     */
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;
    }

    /**
     * @return mixed
     */
    public function getAeronave()
    {
        return $this->aeronave;
    }

    /**
     * @param mixed $aeronave
     */
    public function setAeronave($aeronave)
    {
        $this->aeronave = $aeronave;
    }

    /**
     * @return \DateTime
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @param \DateTime $fecha
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    /**
     * @return mixed
     */
    public function getOrigen()
    {
        return $this->origen;
    }

    /**
     * @param mixed $origen
     */
    public function setOrigen($origen)
    {
        $this->origen = $origen;
    }

    /**
     * @return mixed
     */
    public function getDestino()
    {
        return $this->destino;
    }

    /**
     * @param mixed $destino
     */
    public function setDestino($destino)
    {
        $this->destino = $destino;
    }

    /**
     * @return mixed
     */
    public function getMission()
    {
        return $this->mission;
    }

    /**
     * @param mixed $mission
     */
    public function setMission($mission)
    {
        $this->mission = $mission;
    }

    /**
     * @return mixed
     */
    public function getSalud()
    {
        return $this->salud;
    }

    /**
     * @param mixed $salud
     */
    public function setSalud($salud)
    {
        $this->salud = $salud;
    }

    /**
     * @return mixed
     */
    public function getSituacion()
    {
        return $this->situacion;
    }

    /**
     * @param mixed $situacion
     */
    public function setSituacion($situacion)
    {
        $this->situacion = $situacion;
    }

    /**
     * @return mixed
     */
    public function getDescanso()
    {
        return $this->descanso;
    }

    /**
     * @param mixed $descanso
     */
    public function setDescanso($descanso)
    {
        $this->descanso = $descanso;
    }

    /**
     * @return mixed
     */
    public function getExperienciaTripulacionPiloto()
    {
        return $this->experienciaTripulacionPiloto;
    }

    /**
     * @param mixed $experienciaTripulacionPiloto
     */
    public function setExperienciaTripulacionPiloto($experienciaTripulacionPiloto)
    {
        $this->experienciaTripulacionPiloto = $experienciaTripulacionPiloto;
    }

    /**
     * @return mixed
     */
    public function getExperienciaTripulacionCoPiloto()
    {
        return $this->experienciaTripulacionCoPiloto;
    }

    /**
     * @param mixed $experienciaTripulacionCoPiloto
     */
    public function setExperienciaTripulacionCoPiloto($experienciaTripulacionCoPiloto)
    {
        $this->experienciaTripulacionCoPiloto = $experienciaTripulacionCoPiloto;
    }

    /**
     * @return mixed
     */
    public function getExperienciaTripulacionRutaPiloto()
    {
        return $this->experienciaTripulacionRutaPiloto;
    }

    /**
     * @param mixed $experienciaTripulacionRutaPiloto
     */
    public function setExperienciaTripulacionRutaPiloto($experienciaTripulacionRutaPiloto)
    {
        $this->experienciaTripulacionRutaPiloto = $experienciaTripulacionRutaPiloto;
    }

    /**
     * @return mixed
     */
    public function getExperienciaTripulacionRutaCoPiloto()
    {
        return $this->experienciaTripulacionRutaCoPiloto;
    }

    /**
     * @param mixed $experienciaTripulacionRutaCoPiloto
     */
    public function setExperienciaTripulacionRutaCoPiloto($experienciaTripulacionRutaCoPiloto)
    {
        $this->experienciaTripulacionRutaCoPiloto = $experienciaTripulacionRutaCoPiloto;
    }

    /**
     * @return mixed
     */
    public function getAerodromoOrigen()
    {
        return $this->aerodromoOrigen;
    }

    /**
     * @param mixed $aerodromoOrigen
     */
    public function setAerodromoOrigen($aerodromoOrigen)
    {
        $this->aerodromoOrigen = $aerodromoOrigen;
    }

    /**
     * @return mixed
     */
    public function getAerodromoDestino()
    {
        return $this->aerodromoDestino;
    }

    /**
     * @param mixed $aerodromoDestino
     */
    public function setAerodromoDestino($aerodromoDestino)
    {
        $this->aerodromoDestino = $aerodromoDestino;
    }

    /**
     * @return mixed
     */
    public function getMeteorologiaOrigen()
    {
        return $this->meteorologiaOrigen;
    }

    /**
     * @param mixed $meteorologiaOrigen
     */
    public function setMeteorologiaOrigen($meteorologiaOrigen)
    {
        $this->meteorologiaOrigen = $meteorologiaOrigen;
    }

    /**
     * @return mixed
     */
    public function getMeteorologiaDestino()
    {
        return $this->meteorologiaDestino;
    }

    /**
     * @param mixed $meteorologiaDestino
     */
    public function setMeteorologiaDestino($meteorologiaDestino)
    {
        $this->meteorologiaDestino = $meteorologiaDestino;
    }

    /**
     * @return mixed
     */
    public function getDiferidos()
    {
        return $this->diferidos;
    }

    /**
     * @param mixed $diferidos
     */
    public function setDiferidos($diferidos)
    {
        $this->diferidos = $diferidos;
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


    public function __construct() {
        $this->fecha = new \DateTime('now');
    }
}