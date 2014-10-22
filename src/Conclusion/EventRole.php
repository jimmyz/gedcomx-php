<?php
/**
 *
 * 
 *
 * Generated by <a href="http://enunciate.codehaus.org">Enunciate</a>.
 *
 */

namespace Gedcomx\Conclusion;
use Gedcomx\Common\ResourceReference;

/**
 * A role that a specific person plays in an event.
 */
class EventRole extends \Gedcomx\Conclusion\Conclusion
{

    /**
     * The role type.
     *
     * @var string
     */
    private $type;

    /**
     * Reference to the person playing the role in the event.
     *
     * @var ResourceReference
     */
    private $person;

    /**
     * Details about the role of the person in the event.
     *
     * @var string
     */
    private $details;

    /**
     * Constructs a EventRole from a (parsed) JSON hash
     *
     * @param mixed $o Either an array (JSON) or an XMLReader.
     */
    public function __construct($o = null)
    {
        if (is_array($o)) {
            $this->initFromArray($o);
        }
        else if ($o instanceof \XMLReader) {
            $success = true;
            while ($success && $o->nodeType != \XMLReader::ELEMENT) {
                $success = $o->read();
            }
            if ($o->nodeType != \XMLReader::ELEMENT) {
                throw new \Exception("Unable to read XML: no start element found.");
            }

            $this->initFromReader($o);
        }
    }

    /**
     * The role type.
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * The role type.
     *
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }
    /**
     * Reference to the person playing the role in the event.
     *
     * @return ResourceReference
     */
    public function getPerson()
    {
        return $this->person;
    }

    /**
     * Reference to the person playing the role in the event.
     *
     * @param ResourceReference $person
     */
    public function setPerson($person)
    {
        $this->person = $person;
    }
    /**
     * Details about the role of the person in the event.
     *
     * @return string
     */
    public function getDetails()
    {
        return $this->details;
    }

    /**
     * Details about the role of the person in the event.
     *
     * @param string $details
     */
    public function setDetails($details)
    {
        $this->details = $details;
    }
    /**
     * Returns the associative array for this EventRole
     *
     * @return array
     */
    public function toArray()
    {
        $a = parent::toArray();
        if ($this->type) {
            $a["type"] = $this->type;
        }
        if ($this->person) {
            $a["person"] = $this->person->toArray();
        }
        if ($this->details) {
            $a["details"] = $this->details;
        }
        return $a;
    }


    /**
     * Initializes this EventRole from an associative array
     *
     * @param array $o
     */
    public function initFromArray($o)
    {
        if (isset($o['type'])) {
            $this->type = $o["type"];
            unset($o["type"]);
        }
        if (isset($o['person'])) {
            $this->person = new ResourceReference($o["person"]);
            unset($o["person"]);
        }
        if (isset($o['details'])) {
            $this->details = $o["details"];
            unset($o["details"]);
        }
        parent::initFromArray($o);
    }

    /**
     * Sets a known child element of EventRole from an XML reader.
     *
     * @param \XMLReader $xml The reader.
     * @return bool Whether a child element was set.
     */
    protected function setKnownChildElement($xml) {
        $happened = parent::setKnownChildElement($xml);
        if ($happened) {
          return true;
        }
        else if (($xml->localName == 'person') && ($xml->namespaceURI == 'http://gedcomx.org/v1/')) {
            $child = new ResourceReference($xml);
            $this->person = $child;
            $happened = true;
        }
        else if (($xml->localName == 'details') && ($xml->namespaceURI == 'http://gedcomx.org/v1/')) {
            $child = '';
            while ($xml->read() && $xml->hasValue) {
                $child = $child . $xml->value;
            }
            $this->details = $child;
            $happened = true;
        }
        return $happened;
    }

    /**
     * Sets a known attribute of EventRole from an XML reader.
     *
     * @param \XMLReader $xml The reader.
     * @return bool Whether an attribute was set.
     */
    protected function setKnownAttribute($xml) {
        if (parent::setKnownAttribute($xml)) {
            return true;
        }
        else if (($xml->localName == 'type') && (empty($xml->namespaceURI))) {
            $this->type = $xml->value;
            return true;
        }

        return false;
    }

    /**
     * Writes the contents of this EventRole to an XML writer. The startElement is expected to be already provided.
     *
     * @param \XMLWriter $writer The XML writer.
     */
    public function writeXmlContents($writer)
    {
        if ($this->type) {
            $writer->writeAttribute('type', $this->type);
        }
        parent::writeXmlContents($writer);
        if ($this->person) {
            $writer->startElementNs('gx', 'person', null);
            $this->person->writeXmlContents($writer);
            $writer->endElement();
        }
        if ($this->details) {
            $writer->startElementNs('gx', 'details', null);
            $writer->text($this->details);
            $writer->endElement();
        }
    }
}
