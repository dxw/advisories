<?php /* Template name: Inspections */ ?>
<?php while (have_posts()) : the_post() ?>

  <div class="page-title">
    <h1><?php the_title() ?></h1>
    <p>A plugin inspection is a light-touch assurance exercise, intended to identify plugins which are likely to present security issues.</p>
  </div>

  <div class="container">
        <p>
          During a plugin inspection, the tester scans the codebase of the plugin for particular keywords that relate to the inspection
          criteria given below. Matches are then manually reviewed to check for issues of concern. When a match is being reviewed, the code path
          leading to and/or from the match is often reviewed as well, along with the immediately surrounding code. An inspection is an attempt to
          obtain some assurance about the quality of a plugin without going to the time and expense of a <a href="/about/plugin-reviews">plugin review</a>.
        </p>
        <p>
          During an inspection, the tester will look for instances of the failure criteria given below. A plugin inspection which finds issues
          should give you confidence that the plugin is likely to contain issues of concern which you should carefully consider. If we do not find issues,
          you should conduct your own checks to ensure that you agree with our findings. A review is not a substitute for security best-practices.
        </p>
        <p>
          Inspections which conclude that a plugin is vulnerable in a particular configuration will result in a recommendation which assumes that the
          vulnerable configuration is present. The rationale for this is:
        </p>
        <ul>
          <li>
            It is not possible within the scope of an inspection to enumerate potentially vulnerable configurations or to decide how likely it is that
            a given configuration will be in use, or how widespread such use might be;
          </li>
          <li>
            In our experience, when users are given the option to enable something vulnerable, they will eventually do so (even if warned to the contrary).
          </li>
        </ul>

        <p>If greater assurance is required, a <a href="/about/plugin-reviews">code review</a> should be conducted.</p>

        <h3>Results</h3>
        <p>The outputs of a plugin inspection are a list of the matched criteria from the list below, accompanied with a short description of the findings and a recommendation.</p>

        <p>While testers should in general follow the criteria in this section when making recommendations, they may at their discretion make any recommendation. However, if the recommendation is not based on one of the criteria given below, the tester must obtain a second opinion, and must explain the reason for their decision.</p>

        <h3 id="recommendations">The possible recommendations are as follows:</h3>
      </div>

      <div class="content">

        <table class="rating">
        <tbody>
          <tr>
            <td><p><strong>Potentially unsafe</strong></p></td>
            <td>
              <h4>This plugin should not be used unless very careful consideration is given to the vulnerabilities it probably contains and ways to mitigate them.</h4>
              <p>One of the following conditions must be likely:</p>

              <ol>
                <li>The plugin contains a vulnerability which could be exploited by an end user and which would compromise the site’s confidentiality, integrity or availability</li>
                <li>The plugin is written such that its expected, ordinary use could affect the site’s confidentiality, integrity or availability</li>
              </ol>
            </td>
          </tr>
          <tr>
            <td><p><strong>Use with caution</strong></p></td>
            <td>
              <h4>The plugin could be used but its use should be carefully considered.</h4>
              <p>One of the following conditions must be likely:</p>
              <ol>
                <li>The plugin contains a vulnerability which could be exploited by a privileged user to affect the site’s confidentiality, integrity or availability in a manner exceeding the user's privileges</li>
                <li>The plugin appears not to be vulnerable, but could interact with another component in such a way as to become vulnerable</li>
                <li>The plugin meets a large number of failure criteria and is of poor quality, leading the tester to fear that subsequent versions of the plugin are likely to introduce vulnerabilities.</li>
                <li>The plugin is written such that its expected, ordinary use is likely to harm the site’s performance</li>
              </ol>
            </td>
          </tr>
          <tr>
            <td><p><strong>No issues found</strong></p></td>
            <td>
              <h4>No issues were found or the issues identified were minor</h4>
              <p>The plugin appears to be safe for use.</p>

            </td>
          </tr>
        </tbody>
        </table>
      </div>

      <div class="failure">
        <h3 id="failure_criteria">Failure criteria</h3>
        <p>Plugin inspections require human judgement and should not be conducted mechanistically. These criteria are a guide to the sorts of issues that an inspection should consider.</p>
        <p>The presence of a problem described here does not necessarily indicate that a plugin should fail an inspection, or be given a "caution" rating. It's important to consider the impact of the problems that are found and to balance all the relevant factors.</p>
      </div>

      <div class="content">
        <table class="table-striped table">
        <tbody>
          <tr>
            <td style="width: 300px"> <h4>Criterion</h4> </td>
            <td> <h4>Explanation</h4> </td>
          </tr>
          <tr>
            <td> <p>Lack of input sanitisation</p> </td>
            <td> <p>The plugin accesses and uses data from user input without sufficient sanitisation</p> </td>
          </tr>
          <tr>
            <td> <p>Execution of unprepared SQL statements</p> </td>
            <td> <p>The plugin executes unprepared SQL statements without sufficient sanitisation.</p> </td>
          </tr>
          <tr>
            <td> <p>Unsafe generation of PHP code</p> </td>
            <td> <p>The plugin generates and executes PHP code from user-influenceable variables using (for example) eval or create_function</p> </td>
          </tr>
          <tr>
            <td> <p>Poor coding style</p> </td>
            <td>
              <p>Exhibits the characteristics of poor coding style, including (but not limited to):</p>

              <ol>
                <li> <p>Lack of indenting</p> </li>
                <li> <p>Inconsistent indenting</p> </li>
                <li> <p>Code which produces notices</p> </li>
                <li> <p>Lack of clear commenting where it would be appropriate; ie, to explain complex functionality or dense code</p> </li>
              </ol>

              <p>
                Note: This failure criterion is not subjective and is not met merely because of a difference
                in opinion about good style, or because of a few examples of inconsistency or bad practice. The lack of good
                style must materially reduce the tester's ability to understand what the code is doing, thereby indicating
                that the lack of good style has reduced code readability and maintainability.
              </p>
            </td>
          </tr>
          <tr>
            <td> <p>Poor architecture</p> </td>
            <td>
              <p>The plugin exhibits idioms or lack of structure indicative of its author being an inexperienced developer, for example:</p>

              <ol>
                <li> <p>Repetitive use of code which could be factored out</p> </li>
                <li> <p>Use of conditions or language structures which are illogical, unnecessary, unreachable or otherwise betray a lack of structured approach</p> </li>
                <li> <p>Long, unwieldy functions</p> </li>
                <li> <p>Multiple, unrelated long sequences of code in a single file</p</li>
                <li> <p>Lack of object oriented code where it would be appropriate; failure to use well-known design patterns to solve common problems</p> </li>
                <li> <p>Use of deprecated PHP or WordPress functions</p> </li>
              </ol>
            </td>
          </tr>
          <tr>
            <td> <p>Failure to use available core functionality</p> </td>
            <td>
              <p>The plugin fails to use functions available in the core API where appropriate, for example:</p>

              <ol>
                <li> <p>Use of htmlspecialchars() rather than esc_html(), etc</p> </li>
                <li> <p>Failure to use correct functions for enqueuing CSS and JavaScript assets</p> </li>
                <li> <p>Failure to use definitions such as WP_CONTENT_DIR as appropriate</p> </li>
                <li> <p>Use of deprecated WordPress API functions</p> </li>
              </ol>
            </td>
          </tr>
          <tr>
            <td> <p>Unsafe request processing</p> </td>
            <td>
              <p>The plugin generates or processes requests unsafely, for example:</p>

              <ol>
                <li> <p>Failure to use nonces to protect admin operations</p> </li>
                <li> <p>Use of confidential information in query strings</p> </li>
              </ol>
            </td>
          <tr>
            <td> <p>Unsafe file or network IO</p> </td>
            <td>
              <p>The function does not properly escape arguments to IO functions, allowing local files to be included or network calls to be made.</p>
              <p>The plugin makes unsafe assumptions about the locations of files and directories and their permissions.</p>
            </td>
          </tr>
          <tr>
            <td> <p>Emits unescaped variables</p> </td>
            <td> <p>The plugin outputs potentially user-influenceable variables without escaping them.</p> </td>
          </tr>
          <tr>
            <td> <p>Unsafe execution of system commands</p> </td>
            <td> <p>The plugin executes system commands without sufficient sanitisation.</p> </td>
          </tr>
          <tr>
            <td> <p>Potential compatibility issues</p> </td>
            <td>
              <p>The plugin is written in such a way that compatibility issues may exist when it is combined with other plugins, or themes with complex functionality. For example:</p>
              <ol>
                <li>The plugin does not use protocol-relative URLs and may not function properly under HTTPS</li>
                <li>The plugin passes unsanitised input into filters or actions</li>
              </ol>
            </td>
          </tr>
          <tr>
            <td> <p>Very large codebase</p> </td>
            <td>
              <p>The plugin contains more than 15,000 source lines of code. As such, it is more likely than a smaller plugin to contain exploitable issues.</p>
              <p>Note: this is not in itself a failure criterion, but is often a factor when considered alongside other findings. Additionally, the very restrictive scope of a plugin inspection means that very large plugins usually cannot be inspected thoroughly.</p>
            </td>
        </tbody>
        </table>
      </div>

    </div>

<?php endwhile ?>
