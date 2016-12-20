<?php
require_once 'wp-content/themes/dxw-advisories/lib/api/inspection.class.php';

describe('\\DxwSec\\API\\Inspection', function () {

    class InspectionPostScope extends Peridot\Scope\Scope
    {
        public function fake_post($args)
        {
            $defaults = [
                'ID' => rand(999, 9999),
                'post_title' => 'Someone elses rubbish plugin',
                'post_name' => 'someone-elses-rubbish-plugin',
                'post_date' => $this->random_date(),
            ];
            $values = array_merge($defaults, $args);

            return (object) [
                'ID' => $values['ID'],
                'post_author' => 5,
                'post_date' => $values['post_date'],
                'post_date_gmt' => $values['post_date'],
                'post_content' => null,
                'post_title' => $values['post_title'],
                'post_excerpt' => null,
                'post_status' => 'publish',
                'comment_status' => 'closed',
                'ping_status' => 'closed',
                'post_password' => null,
                'post_name' => $values['post_name'],
                'to_ping' => null,
                'pinged' => null,
                'post_modified' => $this->random_date(),
                'post_modified_gmt' => $this->random_date(),
                'post_content_filtered' => null,
                'post_parent' => 0,
                'guid' => 'https://security.dxw.com/?post_type=plugins&#038;p='.$values['ID'],
                'menu_order' => 0,
                'post_type' => 'plugins',
                'post_mime_type' => null,
                'comment_count' => 0,
                'filter' => 'raw',
            ];
        }

        private function random_date()
        {
            $timestamp = rand(0, time());
            return strftime("%Y-%m-%d %H:%M:%S", $timestamp);
        }
    }

    $this->peridotAddChildScope(new InspectionPostScope);

    describe('name', function () {
        it('returns the post title of the inspection, stripped of whitespace', function () {
            $fake_post = $this->fake_post(['post_title' => '  My Awesome Plugin ']);
            $inspection = new DxwSec\API\Inspection($fake_post);
            expect($inspection->name)->to->equal('My Awesome Plugin');
        });
    });

    describe('slug', function () {
        it('returns the slug of the inspection', function () {
            $fake_post = $this->fake_post(['post_name' => 'my-awesome-plugin']);
            $inspection = new DxwSec\API\Inspection($fake_post);
            expect($inspection->slug)->to->equal('my-awesome-plugin');
        });

        it('strips any trailing numbers', function () {
            $fake_post = $this->fake_post(['post_name' => 'my-awesome-plugin-2']);
            $inspection = new DxwSec\API\Inspection($fake_post);
            expect($inspection->slug)->to->equal('my-awesome-plugin');
        });

        it('strips multiple trailing numbers', function () {
            $fake_post = $this->fake_post(['post_name' => 'my-awesome-plugin-10']);
            $inspection = new DxwSec\API\Inspection($fake_post);
            expect($inspection->slug)->to->equal('my-awesome-plugin');
        });
    });

    describe('versions', function () {
        beforeEach(function () {
            \WP_Mock::setUp();
            \Mockery::getConfiguration()->allowMockingNonExistentMethods(true);
        });

        afterEach(function () {
            \WP_Mock::tearDown();
            \Mockery::getConfiguration()->allowMockingNonExistentMethods(false);
        });

        it("returns versions from the post's custom field", function () {
            \WP_Mock::wpFunction('get_field', [
                'args' => ['version_of_plugin', 2418],
                'return' => '1.2.3',
            ]);
            $fake_post = $this->fake_post(['ID' => '2418']);
            $inspection = new DxwSec\API\Inspection($fake_post);
            expect($inspection->versions())->to->equal('1.2.3');
        });
    });

    describe('date', function () {
        it('returns a datetime object from the string in the post', function () {
            $fake_post = $this->fake_post(['post_date' => '2016-07-13 17:44:23']);
            $inspection = new DxwSec\API\Inspection($fake_post);
            expect($inspection->date)->to->loosely->equal(new DateTime('2016-07-13T17:44:23.000000Z'));
        });
    });

    describe('url', function () {
        beforeEach(function () {
            \WP_Mock::setUp();
            \Mockery::getConfiguration()->allowMockingNonExistentMethods(true);
        });

        afterEach(function () {
            \WP_Mock::tearDown();
            \Mockery::getConfiguration()->allowMockingNonExistentMethods(false);
        });

        it('fetches the permalink for the post', function () {
            $fake_post = $this->fake_post(['ID' => '2317']);
            $inspection = new DxwSec\API\Inspection($fake_post);
            \WP_Mock::wpFunction('get_permalink', [
                'args' => [2317],
                'return' => 'https://security.dxw.com/plugins/my-awesome-plugin',
            ]);
            expect($inspection->url())->to->equal('https://security.dxw.com/plugins/my-awesome-plugin');
        });
    });

    describe('result', function () {
        beforeEach(function () {
            \WP_Mock::setUp();
            \Mockery::getConfiguration()->allowMockingNonExistentMethods(true);
        });

        afterEach(function () {
            \WP_Mock::tearDown();
            \Mockery::getConfiguration()->allowMockingNonExistentMethods(false);
        });

        context("when the post has a 'green' recommendation", function () {
            beforeEach(function () {
                \WP_Mock::wpFunction('get_field', [
                    'args' => ['recommendation', 2317],
                    'return' => 'green',
                ]);
            });
            it("reports no issues found", function () {
                $fake_post = $this->fake_post(['ID' => '2317']);
                $inspection = new DxwSec\API\Inspection($fake_post);
                expect($inspection->result())->to->equal('No issues found');
            });
        });

        context("when the post has a 'yellow' recommendation", function () {
            beforeEach(function () {
                \WP_Mock::wpFunction('get_field', [
                    'args' => ['recommendation', 2317],
                    'return' => 'yellow',
                ]);
            });
            it("reports use with caution", function () {
                $fake_post = $this->fake_post(['ID' => '2317']);
                $inspection = new DxwSec\API\Inspection($fake_post);
                expect($inspection->result())->to->equal('Use with caution');
            });
        });

        context("when the post has a 'red' recommendation", function () {
            beforeEach(function () {
                \WP_Mock::wpFunction('get_field', [
                    'args' => ['recommendation', 2317],
                    'return' => 'red',
                ]);
            });
            it("reports potentially unsafe", function () {
                $fake_post = $this->fake_post(['ID' => '2317']);
                $inspection = new DxwSec\API\Inspection($fake_post);
                expect($inspection->result())->to->equal('Potentially unsafe');
            });
        });
    });
});
