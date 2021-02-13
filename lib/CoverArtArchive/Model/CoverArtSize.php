<?php

/**
 * This file is part of the CoverArtArchive API Wrapper created by Stephan Strate.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @package CoverArtArchive\Model
 * @author Stephan Strate <hello@stephan.codes>
 * @link https://github.com/stephan-strate/php-cover-art-archive-api
 * @copyright (c) 2021, Stephan Strate
 * @version 0.0.1
 */

namespace CoverArtArchive\Model;

/**
 * CoverArtArchive offers different sizes of cover arts.
 * This interface reflects available size options to use in request functions.
 * @package CoverArtArchive\Model
 */
interface CoverArtSize
{
    const Small = 250;
    const Medium = 500;
    const Large = 1200;
}
