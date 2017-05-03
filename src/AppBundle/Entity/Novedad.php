<?php

namespace AppBundle\Entity;

use AppBundle\Entity\Base\BaseClass;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * Novedad
 *
 * @ORM\Table(name="novedad")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\NovedadRepository")
 */
class Novedad extends BaseClass
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="inicio", type="datetime")
     */
    private $inicio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fin", type="datetime", nullable=true)
     */
    private $fin;

    /**
     * @var string
     *
     * @ORM\Column(name="observaciones", type="text", nullable=true)
     */
    private $observaciones;

    /**
     * @var int
     *
     * @ORM\Column(name="generado", type="integer")
     */
    private $generado = 0;

    /**
     * @var int
     *
     * @ORM\Column(name="cantidad_alertas", type="integer", nullable=true)
     */
    private $cantidadAlertas;


    /**
     * @var float
     *
     * @ORM\Column(name="parcial_maniobra", type="float", nullable=false)
     */
    private $parcialManiobra;

    /**
     * @var float
     *
     * @ORM\Column(name="promedio_uh", type="float", nullable=false)
     */
    private $promedioUh;


    /**
     * @var
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Intervencion", inversedBy="novedades")
     * @ORM\JoinColumn(name="intervencion_id", referencedColumnName="id", nullable=false)
     */
    private $intervencion;

    /**
     * @var
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Maniobra")
     * @ORM\JoinColumn(name="maniobra_id", referencedColumnName="id", nullable=false)
     */
    private $maniobra;

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
     * Set inicio
     *
     * @param \DateTime $inicio
     *
     * @return Novedad
     */
    public function setInicio($inicio)
    {
        $this->inicio = $inicio;

        return $this;
    }

    /**
     * Get inicio
     *
     * @return \DateTime
     */
    public function getInicio()
    {
        return $this->inicio;
    }

    /**
     * Set fin
     *
     * @param \DateTime $fin
     *
     * @return Novedad
     */
    public function setFin($fin)
    {
        $this->fin = $fin;

        return $this;
    }

    /**
     * Get fin
     *
     * @return \DateTime
     */
    public function getFin()
    {
        return $this->fin;
    }

    /**
     * Set observaciones
     *
     * @param string $observaciones
     *
     * @return Novedad
     */
    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;

        return $this;
    }

    /**
     * Get observaciones
     *
     * @return string
     */
    public function getObservaciones()
    {
        return $this->observaciones;
    }

    /**
     * Set generado
     *
     * @param integer $generado
     *
     * @return Novedad
     */
    public function setGenerado($generado)
    {
        $this->generado = $generado;

        return $this;
    }

    /**
     * Get generado
     *
     * @return int
     */
    public function getGenerado()
    {
        return $this->generado;
    }

    /**
     * Set cantidadAlertas
     *
     * @param integer $cantidadAlertas
     *
     * @return Novedad
     */
    public function setCantidadAlertas($cantidadAlertas)
    {
        $this->cantidadAlertas = $cantidadAlertas;

        return $this;
    }

    /**
     * Get cantidadAlertas
     *
     * @return int
     */
    public function getCantidadAlertas()
    {
        return $this->cantidadAlertas;
    }

    /**
     * Set intervencion
     *
     * @param \AppBundle\Entity\Intervencion $intervencion
     *
     * @return Novedad
     */
    public function setIntervencion(Intervencion $intervencion)
    {
        $this->intervencion = $intervencion;

        return $this;
    }

    /**
     * Get intervencion
     *
     * @return \AppBundle\Entity\Intervencion
     */
    public function getIntervencion()
    {
        return $this->intervencion;
    }

    /**
     * Set maniobra
     *
     * @param \AppBundle\Entity\Maniobra $maniobra
     *
     * @return Novedad
     */
    public function setManiobra(\AppBundle\Entity\Maniobra $maniobra)
    {
        $this->maniobra = $maniobra;

        return $this;
    }

    /**
     * Get maniobra
     *
     * @return \AppBundle\Entity\Maniobra
     */
    public function getManiobra()
    {
        return $this->maniobra;
    }

    /**
     * Set parcialManiobra
     *
     * @param float $parcialManiobra
     *
     * @return Novedad
     */
    public function setParcialManiobra($parcialManiobra)
    {
        $this->parcialManiobra = $parcialManiobra;

        return $this;
    }

    /**
     * Get parcialManiobra
     *
     * @return float
     */
    public function getParcialManiobra()
    {
        return $this->parcialManiobra;
    }

    /**
     * Set promedioUh
     *
     * @param float $promedioUh
     *
     * @return Novedad
     */
    public function setPromedioUh($promedioUh)
    {
        $this->promedioUh = $promedioUh;

        return $this;
    }

    /**
     * Get promedioUh
     *
     * @return float
     */
    public function getPromedioUh()
    {
        return $this->promedioUh;
    }


	/**
	 * @Assert\Callback
	 */
	public function esFechaFinValida(ExecutionContextInterface $context)
	{
		if ( $this->getFin() != ""){

			if ($this->getFin() < $this->getInicio()) {
				$context->buildViolation('La fecha de finalización debe ser mayor a la fecha de inicio.')
				        ->atPath('fin')
				        ->addViolation();
			}

		}

	}

}
