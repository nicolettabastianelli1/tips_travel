<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Viaggio
 *
 * @ORM\Table(name="Viaggio")
 * @ORM\Entity
 */
class Viaggio
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="startData", type="datetime")
     */
    private $startData;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="endData", type="datetime")
     */
    private $endData;

    /**
     * @var string
     *
     * @ORM\Column(name="meta", type="string", length=45)
     */
    private $meta;

    /**
     * @var string
     *
     * @ORM\Column(name="descrizione", type="string", length=1005)
     */
    private $descrizione;

    /**
     * @var boolean
     *
     * @ORM\Column(name="done", type="boolean")
     */
    private $done = true;


    /**
    *
    * @ORM\ManyToOne(targetEntity="Utente", inversedBy="viaggi")
    * @ORM\JoinColumn(name="utente_id" , referencedColumnName="id")
    */
    protected $utente;


    /**
    *
    * @ORM\ManyToOne(targetEntity="Luogo", inversedBy="luogo_info")
    * @ORM\JoinColumn(name="info_meta" , referencedColumnName="id")
    */
    protected $luogo;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set EndData
     *
     * @param \DateTime $data
     *
     * @return Viaggio
     */
    public function setEndData($endData)
    {
        $this->endData = $endData;

        return $this;
    }

    /**
     * Get EndData
     *
     * @return \DateTime
     */
    public function getEndData()
    {
        return $this->endData;
    }


    /**
     * Set StartData
     *
     * @param \DateTime $data
     *
     * @return Viaggio
     */
    public function setStartData($startData)
    {
        $this->startData = $startData;

        return $this;
    }

    /**
     * Get startData
     *
     * @return \DateTime
     */
    public function getStartData()
    {
        return $this->startData;
    }

    /**
     * Set meta
     *
     * @param string $meta
     *
     * @return Viaggio
     */
    public function setMeta($meta)
    {
        $this->meta = $meta;

        return $this;
    }

    /**
     * Get meta
     *
     * @return string
     */
    public function getMeta()
    {
        return $this->meta;
    }


    /**
     * Set descrizione
     *
     * @param string $descrizione
     *
     * @return Viaggio
     */
    public function setDescrizione($descrizione)
    {
        $this->descrizione = $descrizione;

        return $this;
    }

    /**
     * Get descrizione
     *
     * @return string
     */
    public function getDescrizione()
    {
        return $this->descrizione;
    }

    /**
     * Set done
     *
     * @param boolean $done
     *
     * @return Viaggio
     */
    public function setDone($done)
    {
        $this->done = $done;

        return $this;
    }

    /**
     * Get done
     *
     * @return boolean
     */
    public function getDone()
    {
        return $this->done;
    }

    /**
     * Set utente
     *
     * @param \AppBundle\Entity\Utente $utente
     *
     * @return Viaggio
     */
    public function setUtente(\AppBundle\Entity\Utente $utente = null)
    {
        $this->utente = $utente;

        return $this;
    }

    /**
     * Get utente
     *
     * @return \AppBundle\Entity\Utente
     */
    public function getUtente()
    {
        return $this->utente;
    }

    /**
     * Set luogo
     *
     * @param \AppBundle\Entity\Luogo $luogo
     *
     * @return Viaggio
     */
    public function setLuogo(\AppBundle\Entity\Luogo $luogo = null)
    {
        $this->luogo = $luogo;

        return $this;
    }

    /**
     * Get luogo
     *
     * @return \AppBundle\Entity\Luogo
     */
    public function getLuogo()
    {
        return $this->luogo;
    }
}
