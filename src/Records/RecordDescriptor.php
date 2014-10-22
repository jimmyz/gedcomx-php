<?php
/**
 *
 * 
 *
 * Generated by <a href="http://enunciate.codehaus.org">Enunciate</a>.
 *
 */

namespace Gedcomx\Records;

/**
 * A descriptor for a common set of records.
 */
class RecordDescriptor extends \Gedcomx\Links\HypermediaEnabledData
{

    /**
     * The language of this record description.
     *
     * @var string
     */
    private $lang;

    /**
     * Descriptors of the fields that are applicable to this record.
     *
     * @var FieldDescriptor[]
     */
    private $fields;

    /**
     * Constructs a RecordDescriptor from a (parsed) JSON hash
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
     * The language of this record description.
     *
     * @return string
     */
    public function getLang()
    {
        return $this->lang;
    }

    /**
     * The language of this record description.
     *
     * @param string $lang
     */
    public function setLang($lang)
    {
        $this->lang = $lang;
    }
    /**
     * Descriptors of the fields that are applicable to this record.
     *
     * @return FieldDescriptor[]
     */
    public function getFields()
    {
        return $this->fields;
    }

    /**
     * Descriptors of the fields that are applicable to this record.
     *
     * @param FieldDescriptor[] $fields
     */
    public function setFields($fields)
    {
        $this->fields = $fields;
    }
    /**
     * Returns the associative array for this RecordDescriptor
     *
     * @return array
     */
    public function toArray()
    {
        $a = parent::toArray();
        if ($this->lang) {
            $a["lang"] = $this->lang;
        }
        if ($this->fields) {
            $ab = array();
            foreach ($this->fields as $i => $x) {
                $ab[$i] = $x->toArray();
            }
            $a['fields'] = $ab;
        }
        return $a;
    }


    /**
     * Initializes this RecordDescriptor from an associative array
     *
     * @param array $o
     */
    public function initFromArray($o)
    {
        if (isset($o['lang'])) {
            $this->lang = $o["lang"];
            unset($o['lang']);
        }
        $this->fields = array();
        if (isset($o['fields'])) {
            foreach ($o['fields'] as $i => $x) {
                $this->fields[$i] = new FieldDescriptor($x);
            }
            unset($o['fields']);
        }
        parent::initFromArray($o);
    }

    /**
     * Sets a known child element of RecordDescriptor from an XML reader.
     *
     * @param \XMLReader $xml The reader.
     * @return bool Whether a child element was set.
     */
    protected function setKnownChildElement($xml) {
        $happened = parent::setKnownChildElement($xml);
        if ($happened) {
          return true;
        }
        else if (($xml->localName == 'field') && ($xml->namespaceURI == 'http://gedcomx.org/v1/')) {
            $child = new FieldDescriptor($xml);
            if (!isset($this->fields)) {
                $this->fields = array();
            }
            array_push($this->fields, $child);
            $happened = true;
        }
        return $happened;
    }

    /**
     * Sets a known attribute of RecordDescriptor from an XML reader.
     *
     * @param \XMLReader $xml The reader.
     * @return bool Whether an attribute was set.
     */
    protected function setKnownAttribute($xml) {
        if (parent::setKnownAttribute($xml)) {
            return true;
        }
        else if (($xml->localName == 'lang') && ($xml->namespaceURI == 'http://www.w3.org/XML/1998/namespace')) {
            $this->lang = $xml->value;
            return true;
        }

        return false;
    }

    /**
     * Writes the contents of this RecordDescriptor to an XML writer. The startElement is expected to be already provided.
     *
     * @param \XMLWriter $writer The XML writer.
     */
    public function writeXmlContents($writer)
    {
        if ($this->lang) {
            $writer->writeAttribute('xml:lang', $this->lang);
        }
        parent::writeXmlContents($writer);
        if ($this->fields) {
            foreach ($this->fields as $i => $x) {
                $writer->startElementNs('gx', 'field', null);
                $x->writeXmlContents($writer);
                $writer->endElement();
            }
        }
    }
}
