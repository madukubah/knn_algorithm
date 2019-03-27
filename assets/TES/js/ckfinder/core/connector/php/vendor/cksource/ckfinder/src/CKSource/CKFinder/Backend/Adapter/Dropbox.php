<?php

/*
 * CKFinder
 * ========
 * http://cksource.com/ckfinder
 * Copyright (C) 2007-2016, CKSource - Frederico Knabben. All rights reserved.
 *
 * The software, this file and its contents are subject to the CKFinder
 * License. Please read the license.txt file before using, installing, copying,
 * modifying or distribute this file or part of its contents. The contents of
 * this file is part of the Source Code of CKFinder.
 */

namespace CKSource\CKFinder\Backend\Adapter;

use League\Flysystem\Util\MimeType;
use Spatie\Dropbox\Client as DropboxClient;

/**
 * The Dropbox class.
 *
 * Extends the default Dropbox adapter to add some extra features.
 */
class Dropbox extends \Spatie\FlysystemDropbox\DropboxAdapter
{
    /**
     * Backend configuration node.
     *
     * @var array $backendConfig
     */
    protected $backendConfig;

    /**
     * Constructor.
     *
     * @param DropboxClient $client
     * @param array  $backendConfig
     */
    public function __construct(DropboxClient $client, array $backendConfig)
    {
        $this->backendConfig = $backendConfig;

        parent::__construct($client, isset($backendConfig['root']) ? $backendConfig['root'] : null);
    }

    /**
     * Returns a direct link to a file stored in Dropbox.
     *
     * @param string $path
     *
     * @return string
     */
    public function getFileUrl($path)
    {
        $fullPath = $this->applyPathPrefix($path);

        $parameters = [
            'path' => '/'.trim($fullPath, '/')
        ];

        $sharedLinkUrl = null;

        $response = $this->client->rpcEndpointRequest('sharing/list_shared_links', $parameters);

        if (is_array($response) && isset($response['links']) && !empty($response['links'])) {
            $linkInfo = current($response['links']);
            $sharedLinkUrl = $linkInfo['url'];
        } else {
            $fileInfo = $this->client->createSharedLinkWithSettings($fullPath);

            if (!isset($fileInfo['url'])) {
                return null;
            }

            $sharedLinkUrl = $fileInfo['url'];
        }

        if (substr($sharedLinkUrl, -5) === '?dl=0') {
            $sharedLinkUrl[strlen($sharedLinkUrl)-1] = '1';
        }

        return $sharedLinkUrl;
    }

    /**
     * Returns the file MIME type.
     *
     * The Dropbox API v2 does not support mimetypes, but it's required
     * by some connector features, so this method tries to guess one using
     * file extension.
     *
     * @param string $path
     *
     * @return array|false|null|string
     */
    public function getMimeType($path)
    {
        $ext = pathinfo($path, PATHINFO_EXTENSION);

        $mimeType = MimeType::detectByFileExtension(strtolower($ext));

        return array('mimetype' => $mimeType ? $mimeType : 'application/octet-stream');
    }

    /**
     * Returns file metadata, including guessed mimetype.
     *
     * @param string $path
     * @return array
     */
    public function getMetadata($path)
    {
        $metadata = parent::getMetadata($path);

        return array_merge($metadata, $this->getMimeType($path));
    }
}
