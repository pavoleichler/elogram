<?php

namespace Larabros\Elogram\Entities;

use Larabros\Elogram\Http\Response;

/**
 * Comment
 *
 * @package    Elogram
 * @author     Hassan Khan <contact@hassankhan.me>
 * @link       https://github.com/hassankhan/elogram-sdk
 * @license    MIT
 */
class Comment extends AbstractEntity
{

    /**
     * Get a list of recent comments on a media object.
     *
     * @param string $mediaId  The ID of the media object
     *
     * @return Response
     *
     * @link https://www.instagram.com/developer/endpoints/comments/#get_media_comments
     */
    public function get($mediaId)
    {
        return $this->client->request('GET', "media/$mediaId/comments");
    }

    /**
     * Create a comment on a media object using the following rules:
     *
     * - The total length of the comment cannot exceed 300 characters.
     * - The comment cannot contain more than 4 hashtags.
     * - The comment cannot contain more than 1 URL.
     * - The comment cannot consist of all capital letters.
     *
     * @param string $mediaId  The ID of the media object
     * @param string $text     Text to post as a comment on the media object as specified by `$mediaId`
     *
     * @return Response
     *
     * @link https://www.instagram.com/developer/endpoints/comments/#post_media_comments
     */
    public function create($mediaId, $text)
    {
        $params = ['form_params' => ['text' => $text]];
        return $this->client->request('POST', "media/$mediaId/comments", $params);
    }

    /**
     * Remove a comment either on a media object with `$id`.
     *
     * @param string $mediaId    The ID of the media object
     * @param string $commentId  The ID of the comment
     *
     * @return Response
     *
     * @link https://www.instagram.com/developer/endpoints/comments/#delete_media_comments
     */
    public function delete($mediaId, $commentId)
    {
        return $this->client->request('DELETE', "media/$mediaId/comments/$commentId");
    }
}
