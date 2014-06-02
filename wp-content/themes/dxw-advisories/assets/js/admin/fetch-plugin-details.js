(function () {
    'use strict';

    var DataFiller = function ($) {
        this.$ = $
    }

    DataFiller.prototype.listen = function () {
        var thus = this

        this.$('#acf-field-codex_link').blur(function () {
            var m = this.value.match(/https?:\/\/wordpress.org\/plugins\/(.*)\//)
            if (m) {
                var filler = new DataFiller(jQuery)
                filler.fill(m[1])
            } else {
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

                thus.setField('#acf-field-codex_link', data['link'], force)
                thus.setField('#acf-field-name_of_plugin', data['name'])
                thus.setField('#title', data['name'])
                thus.setField('#acf-field-version_of_plugin', data['version'])
                thus.setField('#acf-field-author', data['author'])
                thus.setField('#acf-field-description', data['description'])

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
