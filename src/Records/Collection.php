<?php
/**
 * Generated by <a href="http://enunciate.codehaus.org">Enunciate</a>.
 */

namespace Gedcomx\Records;

use Gedcomx\Common\Attribution;
use Gedcomx\Links\HypermediaEnabledData;
use Gedcomx\Rt\GedcomxModelVisitor;

/**
 * A collection of genealogical resources.
 */
class Collection extends HypermediaEnabledData
{
    /**
     * The language of this description of the collection
     *
     * @var string
     */
    private $lang;

    /**
     * A title for the collection.
     *
     * @var string
     */
    private $title;

    /**
     * The size of the collection, in terms of the number of items in this collection.
     *
     * @var integer
     */
    private $size;

    /**
     * Descriptions of the content of this collection.
     *
     * @var CollectionContent[]
     */
    private $content;

    /**
     * Attribution metadata for this collection.
     *
     * @var Attribution
     */
    private $attribution;

    /**
     * Constructs a Collection from a (parsed) JSON hash
     *
     * @param mixed $o Either an array (JSON) or an XMLReader.
     *
     * @throws \Exception
     */
    public function __construct($o = null)
    {
        if (is_array($o)) {
            $this->initFromArray($o);
        } else {
            if ($o instanceof \XMLReader) {
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
    }

    /**
     * The language of this description of the collection
     *
     * @return string
     */
    public function getLang()
    {
        return $this->lang;
    }

    /**
     * The language of this description of the collection
     *
     * @param string $lang
     */
    public function setLang($lang)
    {
        $this->lang = $lang;
    }

    /**
     * A title for the collection.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * A title for the collection.
     *
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * The size of the collection, in terms of the number of items in this collection.
     *
     * @return integer
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * The size of the collection, in terms of the number of items in this collection.
     *
     * @param integer $size
     */
    public function setSize($size)
    {
        $this->size = $size;
    }

    /**
     * Descriptions of the content of this collection.
     *
     * @return \Gedcomx\Records\CollectionContent[]
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Descriptions of the content of this collection.
     *
     * @param \Gedcomx\Records\CollectionContent[] $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * Attribution metadata for this collection.
     *
     * @return \Gedcomx\Common\Attribution
     */
    public function getAttribution()
    {
        return $this->attribution;
    }

    /**
     * Attribution metadata for this collection.
     *
     * @param \Gedcomx\Common\Attribution $attribution
     */
    public function setAttribution($attribution)
    {
        $this->attribution = $attribution;
    }

    /**
     * Returns the associative array for this Collection
     *
     * @return array
     */
    public function toArray()
    {
        $a = parent::toArray();
        if ($this->lang) {
            $a["lang"] = $this->lang;
        }
        if ($this->title) {
            $a["title"] = $this->title;
        }
        if ($this->size) {
            $a["size"] = $this->size;
        }
        if ($this->content) {
            $ab = array();
            foreach ($this->content as $i => $x) {
                $ab[$i] = $x->toArray();
            }
            $a['content'] = $ab;
        }
        if ($this->attribution) {
            $a["attribution"] = $this->attribution->toArray();
        }

        return $a;
    }

    /**
     * Initializes this Collection from an associative array
     *
     * @param array $o
     */
    public function initFromArray(array $o)
    {
        if (isset($o['lang'])) {
            $this->lang = $o["lang"];
            unset($o['lang']);
        }
        if (isset($o['title'])) {
            $this->title = $o["title"];
            unset($o['title']);
        }
        if (isset($o['size'])) {
            $this->size = $o["size"];
            unset($o['size']);
        }
        $this->content = array();
        if (isset($o['content'])) {
            foreach ($o['content'] as $i => $x) {
                $this->content[$i] = new CollectionContent($x);
            }
            unset($o['content']);
        }
        if (isset($o['attribution'])) {
            $this->attribution = new Attribution($o["attribution"]);
            unset($o['attribution']);
        }
        parent::initFromArray($o);
    }

    public function accept(GedcomxModelVisitor $visitor)
    {
        $visitor->visitCollection($this);
    }

    /**
     * Sets a known child element of Collection from an XML reader.
     *
     * @param \XMLReader $xml The reader.
     *
     * @return bool Whether a child element was set.
     */
    protected function setKnownChildElement(\XMLReader $xml)
    {
        $happened = parent::setKnownChildElement($xml);
        if ($happened) {
            return true;
        } else {
            if (($xml->localName == 'title') && ($xml->namespaceURI == 'http://gedcomx.org/v1/')) {
                $child = '';
                while ($xml->read() && $xml->hasValue) {
                    $child = $child . $xml->value;
                }
                $this->title = $child;
                $happened = true;
            } else {
                if (($xml->localName == 'size') && ($xml->namespaceURI == 'http://gedcomx.org/v1/')) {
                    $child = '';
                    while ($xml->read() && $xml->hasValue) {
                        $child = $child . $xml->value;
                    }
                    $this->size = $child;
                    $happened = true;
                } else {
                    if (($xml->localName == 'content') && ($xml->namespaceURI == 'http://gedcomx.org/v1/')) {
                        $child = new CollectionContent($xml);
                        if (!isset($this->content)) {
                            $this->content = array();
                        }
                        array_push($this->content, $child);
                        $happened = true;
                    } else {
                        if (($xml->localName == 'attribution') && ($xml->namespaceURI == 'http://gedcomx.org/v1/')) {
                            $child = new Attribution($xml);
                            $this->attribution = $child;
                            $happened = true;
                        }
                    }
                }
            }
        }

        return $happened;
    }

    /**
     * Sets a known attribute of Collection from an XML reader.
     *
     * @param \XMLReader $xml The reader.
     *
     * @return bool Whether an attribute was set.
     */
    protected function setKnownAttribute(\XMLReader $xml)
    {
        if (parent::setKnownAttribute($xml)) {
            return true;
        } else {
            if (($xml->localName == 'lang') && ($xml->namespaceURI == 'http://www.w3.org/XML/1998/namespace')) {
                $this->lang = $xml->value;

                return true;
            }
        }

        return false;
    }

    /**
     * Writes this Collection to an XML writer.
     *
     * @param \XMLWriter $writer            The XML writer.
     * @param bool       $includeNamespaces Whether to write out the namespaces in the element.
     */
    public function toXml(\XMLWriter $writer, $includeNamespaces = true)
    {
        $writer->startElementNS('gx', 'collection', null);
        if ($includeNamespaces) {
            $writer->writeAttributeNs('xmlns', 'gx', null, 'http://gedcomx.org/v1/');
            $writer->writeAttributeNs('xmlns', 'xml', null, 'http://www.w3.org/XML/1998/namespace');
        }
        $this->writeXmlContents($writer);
        $writer->endElement();
    }

    /**
     * Writes the contents of this Collection to an XML writer. The startElement is expected to be already provided.
     *
     * @param \XMLWriter $writer The XML writer.
     */
    public function writeXmlContents(\XMLWriter $writer)
    {
        if ($this->lang) {
            $writer->writeAttribute('xml:lang', $this->lang);
        }
        parent::writeXmlContents($writer);
        if ($this->title) {
            $writer->startElementNs('gx', 'title', null);
            $writer->text($this->title);
            $writer->endElement();
        }
        if ($this->size) {
            $writer->startElementNs('gx', 'size', null);
            $writer->text($this->size);
            $writer->endElement();
        }
        if ($this->content) {
            foreach ($this->content as $i => $x) {
                $writer->startElementNs('gx', 'content', null);
                $x->writeXmlContents($writer);
                $writer->endElement();
            }
        }
        if ($this->attribution) {
            $writer->startElementNs('gx', 'attribution', null);
            $this->attribution->writeXmlContents($writer);
            $writer->endElement();
        }
    }
}
