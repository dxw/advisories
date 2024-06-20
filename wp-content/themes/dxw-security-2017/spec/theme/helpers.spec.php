<?php

describe(\Dxw\DxwSecurity2017\Theme\Helpers::class, function () {
    beforeEach(function () {
        \WP_Mock::setUp();
        \WP_Mock::setUp();
        $this->iguanaHelpers = Mockery::mock(\Dxw\Iguana\Theme\Helpers::class);
        $this->helpers = new \Dxw\DxwSecurity2017\Theme\Helpers($this->iguanaHelpers);
    });

    afterEach(function () {
        \WP_Mock::tearDown();
    });

    it('is registrable', function () {
        expect($this->helpers)->toBeAnInstanceOf(\Dxw\Iguana\Registerable::class);
    });

    describe('->register()', function () {
        it('registers the helper functions', function () {
            $this->iguanaHelpers->shouldReceive('registerFunction')
                ->once()
                ->with('the_title_for_email', [$this->helpers, 'the_title_for_email']);
            $this->iguanaHelpers->shouldReceive('registerFunction')
                ->once()
                ->with('the_advisory_id', [$this->helpers, 'the_advisory_id']);
            $this->iguanaHelpers->shouldReceive('registerFunction')
                ->once()
                ->with('the_short_recommendation', [$this->helpers, 'the_short_recommendation']);
            $this->iguanaHelpers->shouldReceive('registerFunction')
                ->once()
                ->with('the_recommendation', [$this->helpers, 'the_recommendation']);
            $this->iguanaHelpers->shouldReceive('registerFunction')
                ->once()
                ->with('recommendation_data', [$this->helpers, 'recommendation_data']);
            $this->iguanaHelpers->shouldReceive('registerFunction')
                ->once()
                ->with('get_field_label', [$this->helpers, 'get_field_label']);
            $this->iguanaHelpers->shouldReceive('registerFunction')
                ->once()
                ->with('the_field_label', [$this->helpers, 'the_field_label']);
            $this->iguanaHelpers->shouldReceive('registerFunction')
                ->once()
                ->with('the_other_versions', [$this->helpers, 'the_other_versions']);
            $this->iguanaHelpers->shouldReceive('registerFunction')
                ->once()
                ->with('get_plugin_vulnerabilities', [$this->helpers, 'get_plugin_vulnerabilities']);
            $this->iguanaHelpers->shouldReceive('registerFunction')
                ->once()
                ->with('the_plugin_vulnerabilities', [$this->helpers, 'the_plugin_vulnerabilities']);
            $this->iguanaHelpers->shouldReceive('registerFunction')
                ->once()
                ->with('get_cvss_score', [$this->helpers, 'get_cvss_score']);
            $this->iguanaHelpers->shouldReceive('registerFunction')
                ->once()
                ->with('the_cvss_score', [$this->helpers, 'the_cvss_score']);
            $this->iguanaHelpers->shouldReceive('registerFunction')
                ->once()
                ->with('get_cvss_severity', [$this->helpers, 'get_cvss_severity']);
            $this->iguanaHelpers->shouldReceive('registerFunction')
                ->once()
                ->with('the_cvss_severity', [$this->helpers, 'the_cvss_severity']);
            $this->helpers->register();
        });
    });

    //These helpers methods were all taken directly from the old theme, where they had no tests

    describe('->the_title_for_email', function () {
        xit('produces an email title', function () {
            $this->helpers->the_title_for_email(1);
        });
    });

    describe('->the_advisory_id()', function () {
        xit('echoes the id', function () {
            $this->helpers->the_advisory_id(1);
        });
    });

    describe('->the_short_recommendation()', function () {
        xit('outputs the short recommendation', function () {
            $this->helpers->the_short_recommendation();
        });
    });

    describe('->the_recommendation()', function () {
        xit('outputs the recommendation', function () {
            $this->helpers->the_recommendation();
        });
    });

    describe('->recommendation_data()', function () {
        xit('returns recommendation data', function () {
            $this->helpers->recommendation_data();
        });
    });

    describe('->get_field_label()', function () {
        xit('returns field label', function () {
            $this->helpers->get_field_label();
        });
    });

    describe('->the_field_label()', function () {
        xit('echoes the field label', function () {
            $this->helpers->the_field_label();
        });
    });

    describe('->the_other_versions()', function () {
        xit('outputs a list of other versions reviewed', function () {
            $this->helpers->the_other_versions();
        });
    });

    describe('->get_plugin_vulnerabilities()', function () {
        xit('returns advisories', function () {
            $this->helpers->get_plugin_vulnerabilities();
        });
    });

    describe('->the_plugin_vulnerabilities()', function () {
        xit('returns advisories', function () {
            $this->helpers->the_plugin_vulnerabilities();
        });
    });

    describe('->get_cvss_score()', function () {
        xit('returns cvss score', function () {
            $this->helpers->get_cvss_score();
        });
    });

    describe('->the_cvss_score()', function () {
        xit('echoes cvss score', function () {
            $this->helpers->the_cvss_score();
        });
    });

    describe('->get_cvss_severity()', function () {
        xit('returns cvss severity', function () {
            $this->helpers->get_cvss_severity();
        });
    });

    describe('->the_cvss_severity()', function () {
        xit('echoes cvss severity', function () {
            $this->helpers->the_cvss_severity();
        });
    });
});
