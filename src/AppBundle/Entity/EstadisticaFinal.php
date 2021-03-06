<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EstadisticaFinal
 *
 * @ORM\Table(name="estadistica_final")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EstadisticaFinalRepository")
 */
class EstadisticaFinal
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
     * @var string
     *
     * @ORM\Column(name="tiempo_total", type="string", length=255)
     */
    private $tiempoTotal;

    /**
     * @var string
     *
     * @ORM\Column(name="tiempo_maniobras", type="string", length=255)
     */
    private $tiempoManiobras;

    /**
     * @var float
     *
     * @ORM\Column(name="prom_vb", type="float")
     */
    private $promVb;

    /**
     * @var float
     *
     * @ORM\Column(name="prom_tbg", type="float")
     */
    private $promTbg;

    /**
     * @var float
     *
     * @ORM\Column(name="ftu", type="float")
     */
    private $ftu;

    /**
     * @var int
     *
     * @ORM\Column(name="cant_alertas", type="integer")
     */
    private $cantAlertas;

    /**
     * @var string
     *
     * @ORM\Column(name="tiempo_online", type="string", length=255)
     */
    private $tiempoOnline;

    /**
     * @var float
     *
     * @ORM\Column(name="prom_canos_hora_saca_single", type="float")
     */
    private $promCanosHoraSacaSingle;

    /**
     * @var float
     *
     * @ORM\Column(name="prom_canos_hora_baja_single", type="float")
     */
    private $promCanosHoraBajaSingle;

    /**
     * @var float
     *
     * @ORM\Column(name="prom_canos_hora_saca_doble", type="float")
     */
    private $promCanosHoraSacaDoble;

    /**
     * @var float
     *
     * @ORM\Column(name="prom_canos_hora_baja_doble", type="float")
     */
    private $promCanosHoraBajaDoble;

    /**
     * @var float
     *
     * @ORM\Column(name="prom_vb_saca_single", type="float")
     */
    private $promVbSacaSingle;

    /**
     * @var float
     *
     * @ORM\Column(name="prom_vb_baja_single", type="float")
     */
    private $promVbBajaSingle;

    /**
     * @var float
     *
     * @ORM\Column(name="prom_vb_saca_doble", type="float")
     */
    private $promVbSacaDoble;

    /**
     * @var float
     *
     * @ORM\Column(name="prom_vb_baja_doble", type="float")
     */
    private $promVbBajaDoble;

    /**
     * @var float
     *
     * @ORM\Column(name="prom_canos_hora_saca_bruto", type="float")
     */
    private $promCanosHoraSacaBruto;

    /**
     * @var float
     *
     * @ORM\Column(name="prom_canos_hora_baja_bruto", type="float")
     */
    private $promCanosHoraBajaBruto;

    /**
     * @var float
     *
     * @ORM\Column(name="prom_vb_saca_bruto", type="float")
     */
    private $promVbSacaBruto;

    /**
     * @var float
     *
     * @ORM\Column(name="prom_vb_baja_bruto", type="float")
     */
    private $promVbBajaBruto;

    /**
     * @var integer
     *
     * @ORM\Column(name="vb_saca", type="integer")
     */
    private $vbSaca;

    /**
     * @var integer
     *
     * @ORM\Column(name="vb_baja", type="integer")
     */
    private $vbBaja;

    /**
     * @var integer
     *
     * @ORM\Column(name="tbg_saca", type="integer")
     */
    private $tbgSaca;

    /**
     * @var integer
     *
     * @ORM\Column(name="tbg_baja", type="integer")
     */
    private $tbgBaja;

    /**
     * @var json
     *
     * @ORM\Column(name="series", type="json")
     * Ejemplo: {
     *          general:{
     *             graficas:[{
     *                 "nombre":"",
     *                 "descripción":"",
     *                 "grafica":""
     *             }]
     *         },
     *         items:[{
     *             "nro": 1,
     *             "accion": "",
     *             "cantidad": "",
     *             "duracion": "",
     *             "material": "",
     *             "promedio": "",
     *             "fecha_fin": "",
     *             "combinacion": "",
     *             "fecha_inicio": "",
     *             graficas:[{
     *               "nombre":"",
     *               "descripción":"",
     *               "grafica":""
     *             }]
     *         }]
     *       }
     */
    private $series;

    /**
     * @var bool
     *
     * @ORM\Column(name="observada", type="boolean")
     */
    private $observada;

    /**
     * @var text
     *
     * @ORM\Column(name="observaciones", type="text")
     */
    private $observaciones;

    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Intervencion")
     * @ORM\JoinColumn(name="intervencion_id", referencedColumnName="id")
     */
    private $intervencion;

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set tiempoTotal.
     *
     * @param string $tiempoTotal
     *
     * @return EstadisticaFinal
     */
    public function setTiempoTotal($tiempoTotal)
    {
        $this->tiempoTotal = $tiempoTotal;

        return $this;
    }

    /**
     * Get tiempoTotal.
     *
     * @return string
     */
    public function getTiempoTotal()
    {
        return $this->tiempoTotal;
    }

    /**
     * Set tiempoManiobras.
     *
     * @param string $tiempoManiobras
     *
     * @return EstadisticaFinal
     */
    public function setTiempoManiobras($tiempoManiobras)
    {
        $this->tiempoManiobras = $tiempoManiobras;

        return $this;
    }

    /**
     * Get tiempoManiobras.
     *
     * @return string
     */
    public function getTiempoManiobras()
    {
        return $this->tiempoManiobras;
    }

    /**
     * Set promVb.
     *
     * @param float $promVb
     *
     * @return EstadisticaFinal
     */
    public function setPromVb($promVb)
    {
        $this->promVb = $promVb;

        return $this;
    }

    /**
     * Get promVb.
     *
     * @return float
     */
    public function getPromVb()
    {
        return $this->promVb;
    }

    /**
     * Set promTbg.
     *
     * @param float $promTbg
     *
     * @return EstadisticaFinal
     */
    public function setPromTbg($promTbg)
    {
        $this->promTbg = $promTbg;

        return $this;
    }

    /**
     * Get promTbg.
     *
     * @return float
     */
    public function getPromTbg()
    {
        return $this->promTbg;
    }

    /**
     * Set ftu.
     *
     * @param float $ftu
     *
     * @return EstadisticaFinal
     */
    public function setFtu($ftu)
    {
        $this->ftu = $ftu;

        return $this;
    }

    /**
     * Get ftu.
     *
     * @return float
     */
    public function getFtu()
    {
        return $this->ftu;
    }

    /**
     * Set cantAlertas.
     *
     * @param int $cantAlertas
     *
     * @return EstadisticaFinal
     */
    public function setCantAlertas($cantAlertas)
    {
        $this->cantAlertas = $cantAlertas;

        return $this;
    }

    /**
     * Get cantAlertas.
     *
     * @return int
     */
    public function getCantAlertas()
    {
        return $this->cantAlertas;
    }

    /**
     * Set tiempoOnline.
     *
     * @param string $tiempoOnline
     *
     * @return EstadisticaFinal
     */
    public function setTiempoOnline($tiempoOnline)
    {
        $this->tiempoOnline = $tiempoOnline;

        return $this;
    }

    /**
     * Get tiempoOnline.
     *
     * @return string
     */
    public function getTiempoOnline()
    {
        return $this->tiempoOnline;
    }

    /**
     * Set promCanosHoraSacaSingle.
     *
     * @param float $promCanosHoraSacaSingle
     *
     * @return EstadisticaFinal
     */
    public function setPromCanosHoraSacaSingle($promCanosHoraSacaSingle)
    {
        $this->promCanosHoraSacaSingle = $promCanosHoraSacaSingle;

        return $this;
    }

    /**
     * Get promCanosHoraSacaSingle.
     *
     * @return float
     */
    public function getPromCanosHoraSacaSingle()
    {
        return $this->promCanosHoraSacaSingle;
    }

    /**
     * Set promCanosHoraBajaSingle.
     *
     * @param float $promCanosHoraBajaSingle
     *
     * @return EstadisticaFinal
     */
    public function setPromCanosHoraBajaSingle($promCanosHoraBajaSingle)
    {
        $this->promCanosHoraBajaSingle = $promCanosHoraBajaSingle;

        return $this;
    }

    /**
     * Get promCanosHoraBajaSingle.
     *
     * @return float
     */
    public function getPromCanosHoraBajaSingle()
    {
        return $this->promCanosHoraBajaSingle;
    }

    /**
     * Set promCanosHoraSacaDoble.
     *
     * @param float $promCanosHoraSacaDoble
     *
     * @return EstadisticaFinal
     */
    public function setPromCanosHoraSacaDoble($promCanosHoraSacaDoble)
    {
        $this->promCanosHoraSacaDoble = $promCanosHoraSacaDoble;

        return $this;
    }

    /**
     * Get promCanosHoraSacaDoble.
     *
     * @return float
     */
    public function getPromCanosHoraSacaDoble()
    {
        return $this->promCanosHoraSacaDoble;
    }

    /**
     * Set promCanosHoraBajaDoble.
     *
     * @param float $promCanosHoraBajaDoble
     *
     * @return EstadisticaFinal
     */
    public function setPromCanosHoraBajaDoble($promCanosHoraBajaDoble)
    {
        $this->promCanosHoraBajaDoble = $promCanosHoraBajaDoble;

        return $this;
    }

    /**
     * Get promCanosHoraBajaDoble.
     *
     * @return float
     */
    public function getPromCanosHoraBajaDoble()
    {
        return $this->promCanosHoraBajaDoble;
    }

    /**
     * Set promVbSacaSingle.
     *
     * @param float $promVbSacaSingle
     *
     * @return EstadisticaFinal
     */
    public function setPromVbSacaSingle($promVbSacaSingle)
    {
        $this->promVbSacaSingle = $promVbSacaSingle;

        return $this;
    }

    /**
     * Get promVbSacaSingle.
     *
     * @return float
     */
    public function getPromVbSacaSingle()
    {
        return $this->promVbSacaSingle;
    }

    /**
     * Set promVbBajaSingle.
     *
     * @param float $promVbBajaSingle
     *
     * @return EstadisticaFinal
     */
    public function setPromVbBajaSingle($promVbBajaSingle)
    {
        $this->promVbBajaSingle = $promVbBajaSingle;

        return $this;
    }

    /**
     * Get promVbBajaSingle.
     *
     * @return float
     */
    public function getPromVbBajaSingle()
    {
        return $this->promVbBajaSingle;
    }

    /**
     * Set promVbSacaDoble.
     *
     * @param float $promVbSacaDoble
     *
     * @return EstadisticaFinal
     */
    public function setPromVbSacaDoble($promVbSacaDoble)
    {
        $this->promVbSacaDoble = $promVbSacaDoble;

        return $this;
    }

    /**
     * Get promVbSacaDoble.
     *
     * @return float
     */
    public function getPromVbSacaDoble()
    {
        return $this->promVbSacaDoble;
    }

    /**
     * Set promVbBajaDoble.
     *
     * @param float $promVbBajaDoble
     *
     * @return EstadisticaFinal
     */
    public function setPromVbBajaDoble($promVbBajaDoble)
    {
        $this->promVbBajaDoble = $promVbBajaDoble;

        return $this;
    }

    /**
     * Get promVbBajaDoble.
     *
     * @return float
     */
    public function getPromVbBajaDoble()
    {
        return $this->promVbBajaDoble;
    }

    /**
     * Set promCanosHoraSacaBruto.
     *
     * @param float $promCanosHoraSacaBruto
     *
     * @return EstadisticaFinal
     */
    public function setPromCanosHoraSacaBruto($promCanosHoraSacaBruto)
    {
        $this->promCanosHoraSacaBruto = $promCanosHoraSacaBruto;

        return $this;
    }

    /**
     * Get promCanosHoraSacaBruto.
     *
     * @return float
     */
    public function getPromCanosHoraSacaBruto()
    {
        return $this->promCanosHoraSacaBruto;
    }

    /**
     * Set promCanosHoraBajaBruto.
     *
     * @param float $promCanosHoraBajaBruto
     *
     * @return EstadisticaFinal
     */
    public function setPromCanosHoraBajaBruto($promCanosHoraBajaBruto)
    {
        $this->promCanosHoraBajaBruto = $promCanosHoraBajaBruto;

        return $this;
    }

    /**
     * Get promCanosHoraBajaBruto.
     *
     * @return float
     */
    public function getPromCanosHoraBajaBruto()
    {
        return $this->promCanosHoraBajaBruto;
    }

    /**
     * Set promVbSacaBruto.
     *
     * @param float $promVbSacaBruto
     *
     * @return EstadisticaFinal
     */
    public function setPromVbSacaBruto($promVbSacaBruto)
    {
        $this->promVbSacaBruto = $promVbSacaBruto;

        return $this;
    }

    /**
     * Get promVbSacaBruto.
     *
     * @return float
     */
    public function getPromVbSacaBruto()
    {
        return $this->promVbSacaBruto;
    }

    /**
     * Set promVbBajaBruto.
     *
     * @param float $promVbBajaBruto
     *
     * @return EstadisticaFinal
     */
    public function setPromVbBajaBruto($promVbBajaBruto)
    {
        $this->promVbBajaBruto = $promVbBajaBruto;

        return $this;
    }

    /**
     * Get promVbBajaBruto.
     *
     * @return float
     */
    public function getPromVbBajaBruto()
    {
        return $this->promVbBajaBruto;
    }

    /**
     * Set vbSaca.
     *
     * @param int $vbSaca
     *
     * @return EstadisticaFinal
     */
    public function setVbSaca($vbSaca)
    {
        $this->vbSaca = $vbSaca;

        return $this;
    }

    /**
     * Get vbSaca.
     *
     * @return int
     */
    public function getVbSaca()
    {
        return $this->vbSaca;
    }

    /**
     * Set vbBaja.
     *
     * @param int $vbBaja
     *
     * @return EstadisticaFinal
     */
    public function setVbBaja($vbBaja)
    {
        $this->vbBaja = $vbBaja;

        return $this;
    }

    /**
     * Get vbBaja.
     *
     * @return int
     */
    public function getVbBaja()
    {
        return $this->vbBaja;
    }

    /**
     * Set tbgSaca.
     *
     * @param int $tbgSaca
     *
     * @return EstadisticaFinal
     */
    public function setTbgSaca($tbgSaca)
    {
        $this->tbgSaca = $tbgSaca;

        return $this;
    }

    /**
     * Get tbgSaca.
     *
     * @return int
     */
    public function getTbgSaca()
    {
        return $this->tbgSaca;
    }

    /**
     * Set tbgBaja.
     *
     * @param int $tbgBaja
     *
     * @return EstadisticaFinal
     */
    public function setTbgBaja($tbgBaja)
    {
        $this->tbgBaja = $tbgBaja;

        return $this;
    }

    /**
     * Get tbgBaja.
     *
     * @return int
     */
    public function getTbgBaja()
    {
        return $this->tbgBaja;
    }

    /**
     * Set series.
     *
     * @param json $series
     *
     * @return EstadisticaFinal
     */
    public function setSeries($series)
    {
        $this->series = $series;

        return $this;
    }

    /**
     * Get series.
     *
     * @return json
     */
    public function getSeries()
    {
        return $this->series;
    }

    /**
     * Set observada.
     *
     * @param bool $observada
     *
     * @return EstadisticaFinal
     */
    public function setObservada($observada)
    {
        $this->observada = $observada;

        return $this;
    }

    /**
     * Get observada.
     *
     * @return bool
     */
    public function getObservada()
    {
        return $this->observada;
    }

    /**
     * Set observaciones.
     *
     * @param string $observaciones
     *
     * @return EstadisticaFinal
     */
    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;

        return $this;
    }

    /**
     * Get observaciones.
     *
     * @return string
     */
    public function getObservaciones()
    {
        return $this->observaciones;
    }

    /**
     * Set intervencion.
     *
     * @param \AppBundle\Entity\Intervencion|null $intervencion
     *
     * @return EstadisticaFinal
     */
    public function setIntervencion(\AppBundle\Entity\Intervencion $intervencion = null)
    {
        $this->intervencion = $intervencion;

        return $this;
    }

    /**
     * Get intervencion.
     *
     * @return \AppBundle\Entity\Intervencion|null
     */
    public function getIntervencion()
    {
        return $this->intervencion;
    }
}
