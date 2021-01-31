<?php

/**
 * Class ExplosmExtension
 *
 * Highly inspired of https://github.com/kevinpapst/freshrss-dilbert,
 * many thanks to Kevin Papst!
 *
 * Due to the nature of this extension, it significantly slows down
 * the fetching process ... but ONLY for the Explosm feed itself!
 * You should only recognize it during the initial adding and importing process.
 *
 * Latest version can be found at https://framagit.org/dohseven/freshrss-explosm
 *
 * @author Dohseven
 */
class ExplosmExtension extends Minz_Extension
{
    public function install()
    {
        return true;
    }

    public function uninstall()
    {
        return true;
    }

    public function handleConfigureAction()
    {
    }

    /**
     * Initialize this extension
     */
    public function init()
    {
        // Make sure to not run on server without libxml
        if (!extension_loaded('xml')) {
            return;
        }

        $this->registerHook('entry_before_insert', array($this, 'embedExplosm'));
    }

    /**
     * Check if we support working on this entry.
     * We do not want to parse every displayed entry,
     * but only the Explosm ones ;-)
     *
     * @param FreshRSS_Entry $entry
     * @return bool
     */
    protected function supports($entry)
    {
        $link = $entry->link();

        if (stripos($link, '//www.explosm.net/comics') === false) {
            return false;
        }

        return true;
    }

    /**
     * Embed the comic image into the entry, if the feed is from Explosm
     * AND the image can be found in the origin sites content.
     *
     * @param FreshRSS_Entry $entry
     * @return mixed
     */
    public function embedExplosm($entry)
    {
        if (!$this->supports($entry)) {
            return $entry;
        }

        libxml_use_internal_errors(true);
        $dom = new DOMDocument;
        $dom->validateOnParse = true;
        $dom->loadHTMLFile($entry->link());
        libxml_use_internal_errors(false);

        $authorDiv = $dom->getElementById('comic-author');
        if (!is_null($authorDiv)) {
            $originalHash = $entry->hash();

            // Add comic author
            $entry->_author(trim(explode('by', $authorDiv->nodeValue)[1]));

            // Find the img tag
            $image = $dom->getElementById('main-comic');
            if (!is_null($image)) {
                $source = $image->getAttribute('src');
                // If necessary, add protocol to image source.
                // Otherwise reading the articles via the API might fail.
                if (strpos($source, '//') === 0) {
                    $image->setAttribute('src', 'https:' . $source);
                }
                $imageWithLink = $image->ownerDocument->saveHTML($image);

                $entry->_content($imageWithLink);
            }

            $entry->_hash($originalHash);
        }

        return $entry;
    }
}
