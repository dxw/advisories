(function () {
    'use strict';

    var DataFiller = function ($) {
        this.$ = $
    }

    DataFiller.prototype.listen = function () {
        var thus = this

        this.$('div[data-name="codex_link"] input').blur(function () {
            var isWordPressLink = this.value.match(/https?:\/\/(?:en-gb\.)?wordpress.org\/plugins\/(.*)\//)
            var isSlug = this.value.match(/^[A-Za-z0-9]+(?:-[A-Za-z0-9]+)*$/)
            if (isWordPressLink) {
                var filler = new DataFiller(jQuery)
                filler.fill(isWordPressLink[1])
            } else if (isSlug) {
                var filler = new DataFiller(jQuery)
                filler.fill(this.value, true)
            }
        })
    }

    DataFiller.prototype.fill = function (slug, force) {
        var thus = this

        async.waterfall([
            function (callback) {
                // AJAX request

                var nonce = thus.$('html').data('nonce-fetch-plugin-details')
                thus.$.ajax({
                    'url': ajaxurl,
                    'type': 'POST',
                    'data': {
                        'action': 'fetch_plugin_details',
                        '_wpnonce': nonce,
                        'plugin-slug': slug,
                    },
                    'success': function (data) {
                        callback(null, JSON.parse(data))
                    }
                })
            },
            function (data, callback) {
                // Check data is ok
                if (data['ok']) {
                    callback(null, data)
                }
            },
            function (data, callback) {
                // Set fields
                thus.setField('div[data-name="codex_link"] input', data['link'], force)
                thus.setField('input[name=post_title]', data['name'])
                thus.setField('div[data-name="name_of_plugin"] input', data['name'])
                thus.setField('div[data-name="component"] input', data['name'])
                thus.setField('div[data-name="slug"] input', data['slug'])
                thus.setField('div[data-name="version_of_plugin"] input', data['version'])
                thus.setField('div[data-name="version"] input', data['version'])
                thus.setField('div[data-name="author"] input', data['author'])
                thus.setField('div[data-name="description"] input', data['description'])

                callback(null)
            },
        ])
    }

    DataFiller.prototype.setField = function (query, data, force) {
        var elem = this.$(query)

        if (elem.val() === '' || force) {
            elem.val(data)
        }
    }

    DataFiller.prototype.setTinyMceField = function (field, data) {
        // Hack for TinyMCE

        tinyMCE.editors.forEach(function (editor) {
            if (editor.editorId.match(field) && editor.getContent() === '') {
                editor.setContent(data)
            }
        })
    }

    jQuery(function ($) {
        var filler = new DataFiller($)
        filler.listen()
    })
})()
