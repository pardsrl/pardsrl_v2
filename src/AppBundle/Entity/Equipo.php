<?php

namespace AppBundle\Entity;

use AppBundle\Entity\Base\BaseClass;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;


/**
 * Equipo
 *
 * @ORM\Table(name="equipo")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EquipoRepository")
 */
class Equipo extends BaseClass
{

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="modelo", type="string", length=100)
     */
    private $modelo;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Compania")
     * @ORM\JoinColumn(name="compania_id", referencedColumnName="id", nullable=false)
     */
    protected $compania;

    /**
     * @var string
     *
     * @ORM\Column(name="tel", type="string", length=50, nullable=true)
     */
    private $tel;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100, nullable=true)
     */
    private $email;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Persona", inversedBy="equipos")
     */
    private $personas;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Intervencion", mappedBy="equipo")
     */
    private $intervenciones;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\EstadisticaTemporal", mappedBy="equipo")
     */
    private $estadisticas;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Equipo
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set modelo
     *
     * @param string $modelo
     *
     * @return Equipo
     */
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;

        return $this;
    }

    /**
     * Get modelo
     *
     * @return string
     */
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * Set tel
     *
     * @param string $tel
     *
     * @return Equipo
     */
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get tel
     *
     * @return string
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Equipo
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set compania
     *
     * @param \AppBundle\Entity\Compania $compania
     *
     * @return Equipo
     */
    public function setCompania(\AppBundle\Entity\Compania $compania = null)
    {
        $this->compania = $compania;

        return $this;
    }

    /**
     * Get compania
     *
     * @return \AppBundle\Entity\Compania
     */
    public function getCompania()
    {
        return $this->compania;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->personas = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add persona
     *
     * @param \AppBundle\Entity\Persona $persona
     *
     * @return Equipo
     */
    public function addPersona(\AppBundle\Entity\Persona $persona)
    {
        $this->personas[] = $persona;

        return $this;
    }

    /**
     * Remove persona
     *
     * @param \AppBundle\Entity\Persona $persona
     */
    public function removePersona(\AppBundle\Entity\Persona $persona)
    {
        $this->personas->removeElement($persona);
    }

    /**
     * Get personas
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPersonas()
    {
        return $this->personas;
    }


    /**
     * Add intervencione
     *
     * @param \AppBundle\Entity\Intervencion $intervencione
     *
     * @return Equipo
     */
    public function addIntervencione(\AppBundle\Entity\Intervencion $intervencione)
    {
        $this->intervenciones[] = $intervencione;

        return $this;
    }

    /**
     * Remove intervencione
     *
     * @param \AppBundle\Entity\Intervencion $intervencione
     */
    public function removeIntervencione(\AppBundle\Entity\Intervencion $intervencione)
    {
        $this->intervenciones->removeElement($intervencione);
    }

    /**
     * Get intervenciones
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIntervenciones()
    {
        return $this->intervenciones;
    }


    /**
     * Add estadistica
     *
     * @param \AppBundle\Entity\EstadisticaTemporal $estadistica
     *
     * @return Equipo
     */
    public function addEstadistica(\AppBundle\Entity\EstadisticaTemporal $estadistica)
    {
        $this->estadisticas[] = $estadistica;

        return $this;
    }

    /**
     * Remove estadistica
     *
     * @param \AppBundle\Entity\EstadisticaTemporal $estadistica
     */
    public function removeEstadistica(\AppBundle\Entity\EstadisticaTemporal $estadistica)
    {
        $this->estadisticas->removeElement($estadistica);
    }

    /**
     * Get estadisticas
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEstadisticas()
    {
        return $this->estadisticas;
    }

    public function __toString()
    {
        return $this->getNombreCompleto();
    }


    /**
     * Get nombreCompleto
     *
     * @return string
     */
    public function getNombreCompleto()
    {
        return $this->getCompania()->getAcronimo().' '.$this->getNombre();
    }

    public function getWebSocketNamespace()
    {
        return strtolower(str_replace(' ','',$this->getNombreCompleto()));
    }

	/**
	 * Retorna la intervencion asociada al equipo en el caso de que esté interviniendo.
	 * False en el caso de que no esté activo en algun Pozo
	 *
	 * @return bool| Intervencion
	 */
    public function getIntervencionActual()
    {

    	$intervencion =  $this->getIntervenciones()->last();


	    if( $intervencion && $intervencion->esApertura()){
	    	return $intervencion;
	    }

	    return false;
    }
}
