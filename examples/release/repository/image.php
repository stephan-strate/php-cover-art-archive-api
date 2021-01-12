<?php

/**
 * This file is part of the CoverArtArchive API Wrapper created by Stephan Strate.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @package CoverArtArchive
 * @author Stephan Strate <hello@stephan.codes>
 * @link https://github.com/stephan-strate/php-cover-art-archive-api
 * @copyright (c) 2021, Stephan Strate
 * @version 0.0.1
 */

require_once '../../../vendor/autoload.php';

$client = new \CoverArtArchive\Client();
$repository = new \CoverArtArchive\Repository\ReleaseRepository($client);
$image = $repository->coverArtFront('7416e707-94b5-3810-b6b8-4229ab2182ec');

if ($image !== false) {
    header('Content-Type: image/png');
    imagepng($image);
    imagedestroy($image);
}
