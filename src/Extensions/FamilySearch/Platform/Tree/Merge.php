<?php
/**
 *
 * 
 *
 * Generated by <a href="http://enunciate.codehaus.org">Enunciate</a>.
 *
 */

namespace Gedcomx\Extensions\FamilySearch\Platform\Tree;

/**
 * 
 */
class Merge
{
    /**
     * List of resources to remove from the survivor person.
     *
     * @var \Gedcomx\Common\ResourceReference[]
     */
    private $resourcesToDelete;

    /**
     * List of resources to copy from the duplicate person to survivor person.
     *
     * @var \Gedcomx\Common\ResourceReference[]
     */
    private $resourcesToCopy;

    /**
     * Constructs a Merge from a (parsed) JSON hash
     *
     * @param mixed $o Either an array (JSON) or an XMLReader.
     *
     * @throws \Exception
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
     * List of resources to remove from the survivor person.
     *
     * @return \Gedcomx\Common\ResourceReference[]
     */
    public function getResourcesToDelete()
    {
        return $this->resourcesToDelete;
    }

    /**
     * List of resources to remove from the survivor person.
     *
     * @param \Gedcomx\Common\ResourceReference[] $resourcesToDelete
     */
    public function setResourcesToDelete($resourcesToDelete)
    {
        $this->resourcesToDelete = $resourcesToDelete;
    }
    /**
     * List of resources to copy from the duplicate person to survivor person.
     *
     * @return \Gedcomx\Common\ResourceReference[]
     */
    public function getResourcesToCopy()
    {
        return $this->resourcesToCopy;
    }

    /**
     * List of resources to copy from the duplicate person to survivor person.
     *
     * @param \Gedcomx\Common\ResourceReference[] $resourcesToCopy
     */
    public function setResourcesToCopy($resourcesToCopy)
    {
        $this->resourcesToCopy = $resourcesToCopy;
    }
    /**
     * Returns the associative array for this Merge
     *
     * @return array
     */
    public function toArray()
    {
        $a = array();
        if ($this->resourcesToDelete) {
            $ab = array();
            foreach ($this->resourcesToDelete as $i => $x) {
                $ab[$i] = $x->toArray();
            }
            $a['resourcesToDelete'] = $ab;
        }
        if ($this->resourcesToCopy) {
            $ab = array();
            foreach ($this->resourcesToCopy as $i => $x) {
                $ab[$i] = $x->toArray();
            }
            $a['resourcesToCopy'] = $ab;
        }
        return $a;
    }

    /**
     * Returns the JSON string for this Merge
     *
     * @return string
     */
    public function toJson()
    {
        return json_encode($this->toArray());
    }

    /**
     * Initializes this Merge from an associative array
     *
     * @param array $o
     */
    public function initFromArray($o)
    {
        $this->resourcesToDelete = array();
        if (isset($o['resourcesToDelete'])) {
            foreach ($o['resourcesToDelete'] as $i => $x) {
                $this->resourcesToDelete[$i] = new \Gedcomx\Common\ResourceReference($x);
            }
        }
        $this->resourcesToCopy = array();
        if (isset($o['resourcesToCopy'])) {
            foreach ($o['resourcesToCopy'] as $i => $x) {
                $this->resourcesToCopy[$i] = new \Gedcomx\Common\ResourceReference($x);
            }
        }
    }

    /**
     * Initializes this Merge from an XML reader.
     *
     * @param \XMLReader $xml The reader to use to initialize this object.
     */
    public function initFromReader($xml)
    {
        $empty = $xml->isEmptyElement;

        if ($xml->hasAttributes) {
            $moreAttributes = $xml->moveToFirstAttribute();
            while ($moreAttributes) {
                if (!$this->setKnownAttribute($xml)) {
                    //skip unknown attributes...
                }
                $moreAttributes = $xml->moveToNextAttribute();
            }
        }

        if (!$empty) {
            $xml->read();
            while ($xml->nodeType != \XMLReader::END_ELEMENT) {
                if ($xml->nodeType != \XMLReader::ELEMENT) {
                    //no-op: skip any insignificant whitespace, comments, etc.
                }
                else if (!$this->setKnownChildElement($xml)) {
                    $n = $xml->localName;
                    $ns = $xml->namespaceURI;
                    //skip the unknown element
                    while ($xml->nodeType != \XMLReader::END_ELEMENT && $xml->localName != $n && $xml->namespaceURI != $ns) {
                        $xml->read();
                    }
                }
                $xml->read(); //advance the reader.
            }
        }
    }


    /**
     * Sets a known child element of Merge from an XML reader.
     *
     * @param \XMLReader $xml The reader.
     * @return bool Whether a child element was set.
     */
    protected function setKnownChildElement($xml) {
        $happened = false;
        if (($xml->localName == 'resourceToDelete') && ($xml->namespaceURI == 'http://familysearch.org/v1/')) {
            $child = new \Gedcomx\Common\ResourceReference($xml);
            if (!isset($this->resourcesToDelete)) {
                $this->resourcesToDelete = array();
            }
            array_push($this->resourcesToDelete, $child);
            $happened = true;
        }
        else if (($xml->localName == 'resourceToCopy') && ($xml->namespaceURI == 'http://familysearch.org/v1/')) {
            $child = new \Gedcomx\Common\ResourceReference($xml);
            if (!isset($this->resourcesToCopy)) {
                $this->resourcesToCopy = array();
            }
            array_push($this->resourcesToCopy, $child);
            $happened = true;
        }
        return $happened;
    }

    /**
     * Sets a known attribute of Merge from an XML reader.
     *
     * @param \XMLReader $xml The reader.
     * @return bool Whether an attribute was set.
     */
    protected function setKnownAttribute($xml) {

        return false;
    }

    /**
     * Writes this Merge to an XML writer.
     *
     * @param \XMLWriter $writer The XML writer.
     * @param bool $includeNamespaces Whether to write out the namespaces in the element.
     */
    public function toXml($writer, $includeNamespaces = true)
    {
        $writer->startElementNS('fs', 'merge', null);
        if ($includeNamespaces) {
            $writer->writeAttributeNs('xmlns', 'gx', null, 'http://gedcomx.org/v1/');
            $writer->writeAttributeNs('xmlns', 'fs', null, 'http://familysearch.org/v1/');
        }
        $this->writeXmlContents($writer);
        $writer->endElement();
    }

    /**
     * Writes the contents of this Merge to an XML writer. The startElement is expected to be already provided.
     *
     * @param \XMLWriter $writer The XML writer.
     */
    public function writeXmlContents($writer)
    {
        if ($this->resourcesToDelete) {
            foreach ($this->resourcesToDelete as $i => $x) {
                $writer->startElementNs('fs', 'resourceToDelete', null);
                $x->writeXmlContents($writer);
                $writer->endElement();
            }
        }
        if ($this->resourcesToCopy) {
            foreach ($this->resourcesToCopy as $i => $x) {
                $writer->startElementNs('fs', 'resourceToCopy', null);
                $x->writeXmlContents($writer);
                $writer->endElement();
            }
        }
    }
}
