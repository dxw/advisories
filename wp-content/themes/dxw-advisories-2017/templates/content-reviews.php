<?php /* Template name: Reviews */ ?>
<?php while (have_posts()) : the_post() ?>
  <div class="page-title">
        <h1><?php the_title() ?></h1>
        <div class="rich-text">
          <p>A plugin review is a detailed assurance exercise involving line-by-line examination of a plugin, with a view to identifying and proving the existence of vulnerabilities that would affect a site’s confidentiality, integrity or availability.</p>
        </div>
  </div>

  <div class="container">
      <p>
        During a plugin review, the tester code reviews the plugin, line by line, actively attempting to find ways in which the plugin could
        be exploited. A review is a concerted attempt to prove that a plugin is vulnerable to attack, allowing a usage recommendation to
        be given with high confidence.
      </p>

      <p>
        It is not possible for a plugin review to prove that a plugin does not contain vulnerabilities, and a review should not be considered
        a substitute for security best-practices. However, a plugin review which does find issues should give you confidence that the plugin
        definitely contains issues of concern which you should carefully consider. If we do not find issues, you should conduct your own checks to
        ensure that you agree with our findings.
      </p>

      <p>
        A plugin review cannot provide assurance that the site using the plugin is secure, and in particular, cannot demonstrate that a
        plugin is secure if it interacts with other software in ways not anticipated by the tester.
      </p>

      <p>
        If further assurance is required, a penetration test should be conducted.
      </p>

      <h3>Results</h3>
      <p>
        The outputs of a plugin review are a short summary of the findings, a list of the vulnerabilities found and their location in the
        codebase and a recommendation.
      </p>

      <p>
        While testers should in general follow the criteria in this section when making recommendations, they may at their discretion
        make any recommendation. However, if the recommendation is not based on one of the criteria given below, the tester must explain
        the reason for their decision.
      </p>

      <h3>The possible recommendations are as follows:</h3>


        <table class="rating">
        <tbody>
          <tr>
            <td style="background-color: #c00; width: 140px; color: #fff;"><p><strong>Potentially unsafe</strong></p></td>
            <td style="padding-left: 25px;">
              <h4>This plugin should not be used unless very careful consideration is given to the vulnerabilities it contains and ways to mitigate them.</h4>
              <p>One of the following conditions must be true:</p>

              <ol>
                <li>The plugin contains a vulnerability which could be exploited by an end user and which would compromise the site’s confidentiality, integrity or availability</li>
                <li>The plugin is written such that its expected, ordinary use could affect the site’s confidentiality, integrity or availability</li>
              </ol>
            </td>
          </tr>
          <tr>
            <td style="background-color: #ffa300; color: #fff;"><p><strong>Use with caution</strong></p></td>
            <td style="padding-left: 25px;">
              <h4>The plugin could be used but its use should be carefully considered.</h4>
              <p>One of the following conditions must be true:</p>
              <ol>
                <li>The plugin contains a vulnerability which could be exploited by a privileged user to affect the site’s confidentiality, integrity or availability in a manner exceeding the user's privileges</li>
                <li>The plugin appears not to be vulnerable, but could interact with another component in such a way as to become vulnerable</li>
                <li>The plugin meets a large number of failure criteria and is of poor quality, leading the tester to fear that subsequent versions of the plugin are likely to introduce vulnerabilities.</li>
                <li>The plugin is written such that its expected, ordinary use is likely to harm the site’s performance</li>
              </ol>
            </td>
          </tr>
          <tr>
            <td style="background-color: #6aa84f; color: #fff;"><p><strong>No issues found</strong></p></td>
            <td style="padding-left: 25px;">
              <h4>No issues were found or the issues identified were minor</h4>
              <p>The plugin appears to be safe for use.</p>
            </td>
          </tr>
        </tbody>
        </table>

    </div>

<?php endwhile ?>
