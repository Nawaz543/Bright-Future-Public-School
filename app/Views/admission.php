<!-- File: index.html -->
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Admission | Bright Future Public School — Session 2025-26</title>
  <link rel="stylesheet" href="css/admission.css">
  <meta name="description" content="Admissions open for session 2025-26 — Nursery to Class X. Apply online or download the form." />
</head>
<body>
  <header class="site-header">
    <div class="container header-inner">
      <a class="brand" href="/">
        <img src="images/logo.webp" alt="Bright Future Public School Logo" class="logo">
        <span class="brand-text">Bright Future Public School</span>
      </a>

      <div class="actions">
        <button id="theme-toggle" class="btn-icon" aria-label="Toggle dark mode">🌙</button>
      </div>
    </div>
    <div class="container header-inner">
      <a href="/about">About Us</a>
      <a href="/academics">Academics</a>
      <a href="#process">Process</a>
      <a href="#fees">Fees</a>
      <a href="#docs">Documents</a>
      <a href="#contact">Contact</a>
      </div>
    </div>
  </header>

  <main>
    <!-- HERO -->
    <section class="hero">
      <div class="container hero-grid">
        <div class="hero-left">
          <h2>Admissions Open for Session <span class="accent">2025-26</span></h2>
          <p class="lead">Bright Future Public School welcomes applications from Nursery to Class X. Registration fee ₹100 only (non-refundable). Admission on the basis of a minor test &amp; interview. </p>

          <div class="cta-row">
            <a class="btn primary large" href="#apply">Apply Online</a>
            <a class="btn outline" href="<?= base_url($feeStructure['file']) ?>" download>📥 Download Fee Structure (PDF)</a>
          </div>

          <ul class="quick-cards">
            <li>
              <strong>Session</strong>
              <span>Apr 2025 - Mar 2026</span>
            </li>
            <li>
              <strong>Eligibility</strong>
              <span>Nursery (3+ years) - Class X</span>
            </li>
            <li>
              <strong>Registration Fee</strong>
              <span>₹100</span>
            </li>
          </ul>
        </div>

        <div class="hero-right">
          <div class="card animated-card">
            <h3>Important Dates</h3>
            <ul class="dates">
              <li><strong>Registration</strong> — From 2nd Week of January</li>
              <li><strong>Minor Test</strong> — Dates will be shared after registration or you can vist/ contact our school</li>
              <li><strong>Result</strong> — Within 2 days of test</li>
            </ul>
            <p class="muted">Prefer offline? Visit the school office to collect a physical form.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- PROCESS -->
    <section id="process" class="container process">
      <h2>Admission Process</h2>
      <p class="muted">Transparent and parent-friendly steps. The minor test is age-appropriate (English, Hindi, Maths).</p>

      <ol class="timeline">
        <li>
          <div class="badge">1</div>
          <div class="step">
            <h4>Collect / Fill Form</h4>
            <p>Get the form online or from the school office.</p>
          </div>
        </li>
        <li>
          <div class="badge">2</div>
          <div class="step">
            <h4>Submit &amp; Pay ₹100</h4>
            <p>Registration fee is non-refundable.</p>
          </div>
        </li>
        <li>
          <div class="badge">3</div>
          <div class="step">
            <h4>Minor Test</h4>
            <p>Short, friendly test in English, Hindi &amp; Maths.</p>
          </div>
        </li>
        <li>
          <div class="badge">4</div>
          <div class="step">
            <h4>Interview</h4>
            <p>Brief interaction with the child &amp; parents.</p>
          </div>
        </li>
        <li>
          <div class="badge">5</div>
          <div class="step">
            <h4>Result &amp; Verification</h4>
            <p>Document verification and fee payment to confirm admission.</p>
          </div>
        </li>
      </ol>
    </section>

    <!-- FEES -->
    <section id="fees" class="container fees">
      <h2>Fee Overview</h2>
      <p class="muted">For complete details download the PDF. Quick glance below for annual totals.</p>

      <div class="table-wrap">
        <table class="fees-table">
          <thead>
            <tr>
              <th>Class</th>
              <th>Admission Fee</th>
              <th>Tuition (Monthly)</th>
              <th>Activity</th>
              <th>IT / Smart Class</th>
              <th>Total (Approx.)</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Nursery - U.K.G</td>
              <td>₹300</td>
              <td>₹1100</td>
              <td>₹700</td>
              <td>₹1000</td>
              <td>₹5000</td>
            </tr>
            <tr>
              <td>I - II</td>
              <td>₹300</td>
              <td>₹1300</td>
              <td>₹1000</td>
              <td>₹1000</td>
              <td>₹5800</td>
            </tr>
            <tr>
              <td>III - V</td>
              <td>₹300</td>
              <td>₹1300 - 1500</td>
              <td>₹1500</td>
              <td>₹1000</td>
              <td>₹6300</td>
            </tr>
            <tr>
              <td>VI - VIII</td>
              <td>₹300</td>
              <td>₹1500</td>
              <td>₹1800</td>
              <td>₹1000</td>
              <td>₹6600</td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="fee-actions">
        <a href="<?= base_url($feeStructure['file']) ?>" class="btn outline">📥 Download Full Fee PDF</a>
        <a href="#apply" class="btn primary">Proceed to Apply</a>
      </div>
    </section>

    <!-- DOCUMENTS -->
    <section id="docs" class="container docs">
      <h2>Documents Required</h2>
      <div class="docs-grid">
        <ul class="checklist">
          <li>4 Passport size photos of child</li>
          <li>2 Passport size photos of each parent</li>
          <li>2 Passport size photos of guardian (if any)</li>
          <li>Child's Aadhar Card (Xerox)</li>
          <li>Parents' Aadhar Card (Xerox)</li>
          <li>Birth Certificate (Xerox)</li>
          <li>Transfer Certificate (Original, if applicable)</li>
          <li>Last Class Marksheet (Xerox)</li>
        </ul>

        <div class="rules">
          <h4>Important Notes</h4>
          <p>Incomplete forms will not be accepted. Registration does not guarantee admission. Seats are limited and offered on the basis of test performance &amp; availability.</p>
        </div>
      </div>
    </section>

    <!-- APPLY FORM -->
    <section id="apply" class="container apply">
      <div class="apply-grid">
        <div class="form-card">
          <h2>Online Admission Form</h2>
          <p class="muted">Fill the details below and upload required documents. We will contact you with the test date.</p>

          <form id="admission-form" novalidate>
            <div class="row">
              <label for="child-name">Child's Full Name</label>
              <input id="child-name" name="childName" type="text" required />
            </div>

            <div class="row two">
              <div>
                <label for="dob">Date of Birth</label>
                <input id="dob" name="dob" type="date" required />
              </div>
              <div>
                <label for="class-applied">Applying for Class</label>
                <select id="class-applied" name="classApplied" required>
                  <option value="">Select</option>
                  <option>Nursery</option>
                  <option>L.K.G</option>
                  <option>U.K.G</option>
                  <option>I</option>
                  <option>II</option>
                  <option>III</option>
                  <option>IV</option>
                  <option>V</option>
                  <option>VI</option>
                  <option>VII</option>
                  <option>VIII</option>
                </select>
              </div>
            </div>

            <div class="row two">
              <div>
                <label for="parent-name">Parent / Guardian Name</label>
                <input id="parent-name" name="parentName" type="text" required />
              </div>
              <div>
                <label for="parent-education">Parent / Guardian Education</label>
                <input id="parent-education" name="parentEducation" type="text" required />
              </div>
            </div>

            <div class="row two">
              <div>
                <label for="parent-occupation">Parent / Guardian Occupation</label>
                <input id="parent-occupation" name="parentOccupation" type="text" required />
              </div>
              <div>
                <label for="phone">Phone</label>
                <input id="phone" name="phone" type="tel" pattern="[0-9]{10}" placeholder="10 digit" required />
              </div>
            </div>

            <div class="row two">
              <div>
                <label for="phone">Email id </label>
                <input id="phone" name="email" type="text" placeholder="abc@gmail.com (not compulsary)"  />
              </div>
              <div>
                <label for="phone">Whatsapp No.</label>
                <input id="phone" name="whatsapp" type="tel" pattern="[0-9]{10}" placeholder="10 digit" required />
              </div>
            </div>

            <div class="row">
              <label for="address">Address</label>
              <textarea id="address" name="address" rows="3"></textarea>
            </div>

            <div class="row two">
              <div>
                <label for="upload-docs" title="Upload all Documents(listed above) as in zip/pdf file" >Upload Documents (zip/pdf)</label>
                <input id="upload-docs" name="uploadDocs" type="file" accept=".pdf,.zip,.jpg,.jpeg,.png" />
              </div>

              <div>
                <label for="consent">Consent</label>
                <select id="consent" required>
                  <option value="">Select</option>
                  <option value="yes">I agree to the terms &amp; conditions</option>
                </select>
              </div>
            </div>

            <div class="form-foot">
              <button type="submit" class="btn primary">Submit Application</button>
              <a href="assets/pdf/admission-form-2025.pdf" class="btn ghost">Download Offline Form</a>
            </div>

            <div id="form-msg" role="status" aria-live="polite"></div>
          </form>
        </div>

        <aside class="help-card">
          <h3>Need Help?</h3>
          <p>Call our admission office or visit campus during working hours.</p>
          <p><strong>Phone:</strong> +91-7352787879</p>
          <p><strong>Email:</strong> admission@brightfuture.edu</p>
          <p class="muted">Office timings: Mon - Sat, 9:00 AM to 4:00 PM</p>
        </aside>
      </div>
    </section>

    <!-- CONTACT -->
    <section id="contact" class="container contact">
      <h2><a href="/contact">🔗 Contact & Location</a></h2>
      <div class="contact-grid">
        <div>
          <p><strong>Bright Future Public School</strong></p>
          <p>Alagdiha, Pabra Road, Pelawal, Hazaribagh, Jharkhand, PIN - 825301</p>
          <p><strong>Phone:</strong> +91-7352787879</p>
          <p><strong>Email:</strong> admission@brightfuture.edu</p>
        </div>
        <div class="info-map">
          <iframe title="map" src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3644.2758731741537!2d85.33827099999999!3d24.021335!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMjTCsDAxJzE2LjgiTiA4NcKwMjAnMTcuOCJF!5e0!3m2!1sen!2sin!4v1757260865682!5m2!1sen!2sin" width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" aria-hidden="true"></iframe>
        </div>
      </div>
    </section>
  </main>

  <footer class="site-footer">
    <div class="container">
      <p>© <span id="year"></span> Bright Future Public School. All rights reserved.</p>
    </div>
  </footer>

  <script>
    // Small JS for theme toggle, mobile nav and simple form handling
    (function(){
      const root = document.documentElement;
      const themeToggle = document.getElementById('theme-toggle');
      const form = document.getElementById('admission-form');
      const msg = document.getElementById('form-msg');
      const yearSpan = document.getElementById('year');

      yearSpan.textContent = new Date().getFullYear();

      // Respect system preference on first load
      if(window.matchMedia('(prefers-color-scheme: dark)').matches){
        document.documentElement.classList.add('dark');
        themeToggle.textContent = '☀️';
        themeToggle.setAttribute('aria-pressed','true');
      }

      themeToggle.addEventListener('click', function(){
        document.documentElement.classList.toggle('dark');
        const isDark = document.documentElement.classList.contains('dark');
        themeToggle.textContent = isDark ? '☀️' : '🌙';
        themeToggle.setAttribute('aria-pressed', String(isDark));
      });

      // Simple form submit demo (no backend)
      form.addEventListener('submit', function(e){
        e.preventDefault();
        // basic validation
        const childName = form.childName.value.trim();
        const phone = form.phone.value.trim();
        if(!childName || !phone || phone.length < 10){
          msg.textContent = 'Please fill required fields and a valid phone number. ';
          msg.className = 'error';
          return;
        }
        msg.innerHTML = 'Application received. We will contact you soon with test date.<br><br>If you do not hear from the school within 4 days, kindly call or visit the school office for assistance.';
        msg.className = 'success';
        form.reset();
      });

      // tiny animation on scroll (class toggle)
      const cards = document.querySelectorAll('.animated-card');
      const io = new IntersectionObserver((entries)=>{
        entries.forEach(e => { if(e.isIntersecting) e.target.classList.add('in') });
      }, {threshold: .15});
      cards.forEach(c => io.observe(c));
    })();

   document.querySelectorAll("input").forEach(function (inp) {
  inp.addEventListener("input", function () {
    this.value = this.value.toUpperCase();
  });
});


  </script>
</body>
</html>

