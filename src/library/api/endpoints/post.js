/**
 * External
 */
const axios = require('axios');
const qs    = require('qs');

/**
 * Internal
 */
import store from '../../../store';

/**
 * Make requests to the posts endpoint.
 */
export default class Post {
    /**
     * Retrieve available posts.
     *
     * TODO: Handle pagination.
     *
     * @return {Promise}
     */
    async index () {
        return await axios.get('/api/posts');
    }

    /**
     * Attempt to store a new post.
     *
     * @param {Object} data
     *
     * @return {Promise}
     */
    async store (data) {
        data.csrf = store.state.csrf;
        return await axios.post('/api/posts/store', qs.stringify(data));
    }

    /**
     * Delete a post.
     *
     * @param {Integer} postID
     *
     * @return {Promise}
     */
    async delete(postID) {
        const data = {csrf: store.state.csrf};
        return await axios.post(`/api/posts/${postID}/delete`, qs.stringify(data));
    }
};