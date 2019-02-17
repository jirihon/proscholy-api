<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\File
 *
 * @property string|null $filename
 * @property int|null $song_lyric_id
 * @property int|null $author_id
 * @property int|null $licence_type
 * @property string|null $licence_content
 * @property string|null $decription
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\File whereAuthorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\File whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\File whereDecription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\File whereFilename($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\File whereLicenceContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\File whereLicenceType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\File whereSongLyricId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\File whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\File whereId($value)
 */
class File extends Model
{
    //
}
