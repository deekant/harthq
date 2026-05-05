/* Combined scripts from source HTML files */
(function () {
  const path = window.location.pathname.toLowerCase();
  const isHome = path === '/' || path === '';
  const isAbout = path.indexOf('/about') !== -1;
  const isHeartbeat = path.indexOf('/heartbeat') !== -1 || path.indexOf('/hartbeat') !== -1;
  function initMobileNav() {
    const nav = document.getElementById('nav');
    const toggle = document.getElementById('mobileToggle');

    if (!nav || !toggle) {
      return;
    }

    toggle.addEventListener('click', () => {
      nav.classList.toggle('nav-open');
    });

    nav.querySelectorAll('.nav-links a, .nav-cta').forEach((link) => {
      link.addEventListener('click', () => {
        nav.classList.remove('nav-open');
      });
    });
  }

  initMobileNav();

  (function initNavScroll() {
    const nav = document.getElementById('nav');
    if (!nav) {
      return;
    }
    window.addEventListener('scroll', () => {
      nav.classList.toggle('scrolled', window.scrollY > 40);
    });
  })();

  if (isHome) {
    try {
      // Intersection observer for scroll animations
      const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateY(0)';
          }
        });
      }, { threshold: 0.15 });
      
      document.querySelectorAll('.how-step, .service-card, .testi-card, .problem-quote').forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(24px)';
        el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(el);
      });
      
      // Stagger service cards
      document.querySelectorAll('.service-card').forEach((card, i) => {
        card.style.transitionDelay = (i * 0.1) + 's';
      });
      
      document.querySelectorAll('.testi-card').forEach((card, i) => {
        card.style.transitionDelay = (i * 0.12) + 's';
      });

      // Practice calculator teaser — live slider updates
      (function initHomeCalcTeaser() {
        const feeSlider = document.querySelector('.calc-fee-slider');
        const sessionSlider = document.querySelector('.calc-sessions-slider');
        if (!feeSlider || !sessionSlider) {
          return;
        }

        const feeDisplay = document.querySelector('.calc-fee-display');
        const sessionDisplay = document.querySelector('.calc-sessions-display');
        const revenueOut = document.querySelector('.calc-revenue');
        const blendedOut = document.querySelector('.calc-blended');
        const hoursOut = document.querySelector('.calc-hours');
        const gainOut = document.querySelector('.calc-gain');
        if (!feeDisplay || !sessionDisplay || !revenueOut || !blendedOut || !hoursOut || !gainOut) {
          return;
        }

        const WORKING_WEEKS = 46;
        const ADMIN_HRS_WEEK = 10;
        const NOTES_HRS_PER_SESSION = 25 / 60;
        const RECOVERED_HRS_WEEK = 6;
        const HRS_PER_BILLABLE_SESSION = 1 + NOTES_HRS_PER_SESSION;

        function fmt(n) {
          return '$' + Math.round(n).toLocaleString();
        }

        function update() {
          const fee = Number(feeSlider.value);
          const sessions = Number(sessionSlider.value);

          feeDisplay.textContent = '$' + fee + '/hr';
          sessionDisplay.textContent = sessions + ' sessions';

          const annualRevenue = fee * sessions * WORKING_WEEKS;
          const weeklyHours = sessions + sessions * NOTES_HRS_PER_SESSION + ADMIN_HRS_WEEK;
          const blendedRate = annualRevenue / (weeklyHours * WORKING_WEEKS);
          const hoursBack = RECOVERED_HRS_WEEK * WORKING_WEEKS;
          const extraSessionsPerWeek = RECOVERED_HRS_WEEK / HRS_PER_BILLABLE_SESSION;
          const potentialRevenue = extraSessionsPerWeek * fee * WORKING_WEEKS;

          revenueOut.textContent = fmt(annualRevenue);
          blendedOut.textContent = '$' + Math.round(blendedRate) + '/hr';
          hoursOut.textContent = hoursBack + ' hours';
          gainOut.textContent = '+' + fmt(potentialRevenue) + '/yr';
        }

        feeSlider.addEventListener('input', update);
        sessionSlider.addEventListener('input', update);
        update();
      })();
    } catch (err) {
      console.error('Script error on homepage page:', err);
    }
  }

  if (isAbout) {
    try {
      const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateY(0)';
          }
        });
      }, { threshold: 0.12 });
      
      document.querySelectorAll('.belief-card, .how-card, .connection-point').forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(24px)';
        el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(el);
      });
      document.querySelectorAll('.belief-card').forEach((el, i) => { el.style.transitionDelay = (i * 0.1) + 's'; });
    } catch (err) {
      console.error('Script error on about page:', err);
    }
  }

  if (isHeartbeat) {
    try {
        /**
         * Per-dimension maximum points = sum of each question’s option count (data-max-score).
         */
        function getDimScoreCaps() {
          const caps = {};
          document.querySelectorAll('#main-content .question').forEach((q) => {
            const dim = parseInt(q.dataset.dim, 10);
            const cap = parseInt(q.dataset.maxScore, 10);
            if (!Number.isFinite(dim) || !Number.isFinite(cap) || cap < 1) {
              return;
            }
            caps[dim] = (caps[dim] || 0) + cap;
          });
          return caps;
        }

        function getDimsInOrder() {
          return Array.from(document.querySelectorAll('#main-content .dimension'))
            .map((el) => parseInt(el.id.replace(/^dim-/, ''), 10))
            .filter((n) => Number.isFinite(n))
            .sort((a, b) => a - b);
        }

        function initScoresFromDom() {
          const next = {};
          getDimsInOrder().forEach((d) => {
            next[d] = {};
          });
          document.querySelectorAll('#main-content .question').forEach((q) => {
            const dim = parseInt(q.dataset.dim, 10);
            if (!Number.isFinite(dim)) {
              return;
            }
            if (!next[dim]) {
              next[dim] = {};
            }
          });
          return next;
        }

        function getTotalQuestions() {
          return document.querySelectorAll('#main-content .question').length;
        }

        function getStepDimensionEls() {
          return Array.from(document.querySelectorAll('#main-content .dimension.dim-step'));
        }

        let scores = initScoresFromDom();
        let answeredCount = 0;
        let currentStepIdx = 0;

        function getCurrentDimId() {
          const els = getStepDimensionEls();
          const el = els[currentStepIdx];
          if (!el || !el.id) {
            return NaN;
          }
          return parseInt(el.id.replace(/^dim-/, ''), 10);
        }

        function isDimensionComplete(dimId) {
          if (!Number.isFinite(dimId)) {
            return false;
          }
          const qs = document.querySelectorAll(`#dim-${dimId} .question`);
          if (qs.length === 0) {
            return true;
          }
          return Array.from(qs).every((q) => q.classList.contains('answered'));
        }

        function updateStepChrome() {
          const els = getStepDimensionEls();
          const stepLabel = document.getElementById('progress-step');
          const backBtn = document.getElementById('dim-step-back');
          const nextBtn = document.getElementById('dim-step-next');
          const navEl = document.getElementById('dim-step-nav');
          if (!els.length || !nextBtn || !backBtn || !navEl) {
            return;
          }

          const totalSteps = els.length;
          const finishLabel = navEl.dataset.finishLabel || 'View results';
          const nextLabel = navEl.dataset.nextLabel || 'Next';

          if (stepLabel) {
            stepLabel.textContent = `Dimension ${currentStepIdx + 1} of ${totalSteps}`;
          }

          backBtn.disabled = currentStepIdx === 0;

          const last = currentStepIdx >= totalSteps - 1;
          const dimId = getCurrentDimId();
          const totalQuestions = getTotalQuestions();
          const allDone = totalQuestions > 0 && answeredCount === totalQuestions;

          if (last) {
            nextBtn.textContent = finishLabel;
            nextBtn.disabled = !allDone;
          } else {
            nextBtn.textContent = nextLabel;
            nextBtn.disabled = !isDimensionComplete(dimId);
          }
        }

        function showStepAt(index, opts) {
          const scroll = !opts || opts.scroll !== false;
          const els = getStepDimensionEls();
          if (index < 0 || index >= els.length) {
            return;
          }
          currentStepIdx = index;
          els.forEach((el, i) => {
            const on = i === index;
            el.classList.toggle('dim-step--active', on);
            if (on) {
              el.classList.add('visible');
            }
          });
          updateStepChrome();
          if (scroll) {
            const main = document.getElementById('main-content');
            if (main) {
              main.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
          }
        }

        function bindDimStepNav() {
          const backBtn = document.getElementById('dim-step-back');
          const nextBtn = document.getElementById('dim-step-next');
          if (!backBtn || !nextBtn) {
            return;
          }
          backBtn.addEventListener('click', () => {
            if (currentStepIdx > 0) {
              showStepAt(currentStepIdx - 1);
            }
          });
          nextBtn.addEventListener('click', () => {
            const els = getStepDimensionEls();
            if (!els.length) {
              return;
            }
            const last = currentStepIdx >= els.length - 1;
            if (last) {
              const tq = getTotalQuestions();
              if (tq > 0 && answeredCount === tq) {
                showResults();
              }
              return;
            }
            const dimId = getCurrentDimId();
            if (!isDimensionComplete(dimId)) {
              return;
            }
            showStepAt(currentStepIdx + 1);
          });
        }

        function selectOpt(btn) {
          const question = btn.closest('.question');
          const dim = parseInt(question.dataset.dim);
          const q   = parseInt(question.dataset.q);
          const score = parseInt(btn.dataset.score);
          const prev = scores[dim][q];
      
          question.querySelectorAll('.opt').forEach(o => o.classList.remove('selected'));
          btn.classList.add('selected');
          question.classList.add('answered');
      
          if (prev === undefined) answeredCount++;
          scores[dim][q] = score;
      
          updateDimScore(dim);
          updateProgress();
        }
      
        function updateDimScore(dim) {
          const vals = Object.values(scores[dim] || {});
          const total = vals.reduce((a, b) => a + b, 0);
          const dimEl = document.getElementById(`dim-${dim}`);
          const scoreEl = document.getElementById(`score-d${dim}`);
          if (scoreEl) {
            scoreEl.textContent = String(total);
          }
          if (dimEl) {
            dimEl.classList.add('scoring');
          }
        }
      
        function updateProgress() {
          const totalQuestions = getTotalQuestions();
          const pct = totalQuestions > 0 ? (answeredCount / totalQuestions) * 100 : 0;
          document.getElementById('progress-fill').style.width = pct + '%';
          document.getElementById('progress-count').textContent = `${answeredCount} of ${totalQuestions} answered`;
          updateStepChrome();
        }
      
        function showResults() {
          const dimCaps = getDimScoreCaps();
          const dims = getDimsInOrder();
          const dimScores = {};
          let total = 0;
          dims.forEach((d) => {
            const s = Object.values(scores[d] || {}).reduce((a, b) => a + b, 0);
            dimScores[d] = s;
            total += s;
          });

          let maxTotal = 0;
          dims.forEach((d) => {
            maxTotal += dimCaps[d] || 0;
          });
          const score100 = maxTotal > 0 ? Math.round((total / maxTotal) * 100) : 0;

          const submitWrap = document.getElementById('submit-wrap');
          if (submitWrap) {
            submitWrap.style.display = 'none';
            submitWrap.hidden = true;
          }

          const band = getBand(score100);
          const finalScoreEl = document.getElementById('final-score');
          finalScoreEl.innerHTML = `${score100}<span class="score-max">/100</span>`;
          finalScoreEl.style.color = band.color;
          document.getElementById('score-band').textContent = band.band;
          document.getElementById('score-band').style.color = band.color;
          document.getElementById('score-desc').textContent = band.desc;

          // Animate bars
          setTimeout(() => {
            dims.forEach((d) => {
              const s = dimScores[d];
              const maxD = dimCaps[d] || 0;
              const scoreEl = document.getElementById(`bar-score-${d}`);
              const fillEl = document.getElementById(`bar-fill-${d}`);
              const insightEl = document.getElementById(`bar-insight-${d}`);
              if (scoreEl) {
                scoreEl.textContent = `${s}/${maxD}`;
              }
              if (fillEl) {
                fillEl.style.width = maxD > 0 ? `${(s / maxD) * 100}%` : '0%';
              }
              if (insightEl) {
                insightEl.textContent = getDimInsight(d, s, maxD);
              }
            });
          }, 300);

          buildPriorities(dimScores);
          buildCTA(dimScores[4] || 0, score100, dimCaps);
          buildBurnoutIndicator(dimScores, score100, dimCaps);
      
          const results = document.getElementById('results');
          results.style.display = 'block';
          setTimeout(() => results.classList.add('visible'), 50);
          setTimeout(() => results.scrollIntoView({ behavior: 'smooth', block: 'start' }), 100);
          setTimeout(updateMiniCalc, 600);
        }
      
        function getBand(score) {
          if (score >= 80) return {
            band: 'Optimised',
            color: 'var(--teal-mid)',
            desc: 'Your practice is running well. The focus now is maintaining this as your caseload evolves - and catching the small signals before they become bigger problems.'
          };
          if (score >= 60) return {
            band: 'Functional',
            color: 'var(--purple-light)',
            desc: 'Your practice works but has some identifiable drag. One or two dimensions are pulling the score down - and addressing them would meaningfully change how the practice feels to run.'
          };
          if (score >= 40) return {
            band: 'Strained',
            color: 'var(--amber)',
            desc: 'This is the most common band for practitioners at 3–6 years in private practice. Revenue looks reasonable but the hidden cost - in admin load, inconsistent continuity, or fee drift - is significant.'
          };
          return {
            band: 'At Risk',
            color: 'var(--red)',
            desc: 'Your practice has some structural vulnerabilities worth addressing soon. The good news: most of these are fixable with the right systems - they don\'t require you to become a business expert.'
          };
        }
      
        function getDimInsight(dim, score, maxForDim) {
          const insights = {
            1: [
              'Significant capacity loss - no-shows and gaps are materially affecting revenue.',
              'Below average utilisation - addressing cancellation policy and waitlist management would help.',
              'Moderate - some leakage but manageable. A cancellation policy review is worth it.',
              'Good capacity utilisation. Minor improvements to gap-filling would push this higher.',
              'Excellent - you\'re maximising available clinical hours effectively.'
            ],
            2: [
              'High dropout rate - clients are leaving before completing therapy. This is both a clinical and financial concern.',
              'Below average completion - a more proactive rebooking approach would meaningfully change this.',
              'Moderate continuity. A systematic post-session prompt could improve retention noticeably.',
              'Good therapy completion. Outcome measures would strengthen this further.',
              'Strong clinical continuity - clients are completing therapy and you\'re tracking outcomes well.'
            ],
            3: [
              'Fee structure needs attention - you may be significantly undercharging relative to your expertise and local market.',
              'Below market rate and/or high platform dependency. Book a call to talk through your fee and referral mix.',
              'Average revenue integrity - room to improve fee positioning and reduce third-party dependency.',
              'Good fee structure. Regular benchmarking will keep this strong as the market moves.',
              'Strong revenue integrity - you\'re charging appropriately and maintaining independence from platforms.'
            ],
            4: [
              'Very high admin load - this is likely your biggest drag on both income and wellbeing.',
              'Above average admin hours - you\'re spending significant clinical-rate time on non-clinical work.',
              'Moderate admin load. Systems and support could recover meaningful time each week.',
              'Well-managed admin. Good systems in place - the goal is maintaining this.',
              'Lean admin operation - your time is well-protected for clinical work.'
            ],
            5: [
              'Practice is fragile - new clients require constant active effort. One quiet month has a real impact.',
              'Below average flow. Some reliable sources exist but the pipeline feels uncertain.',
              'Moderate - referrals come reasonably consistently but there are gaps.',
              'Good referral flow. Forward booking depth and documented processes would complete the picture.',
              'Resilient practice - well-supplied with work, good forward visibility, and systems to handle disruption.'
            ]
          };
          const list = insights[dim];
          if (!list) {
            return '';
          }
          const idx = maxForDim > 0 ? Math.min(4, Math.floor((score / maxForDim) * 5)) : 0;
          return list[Math.max(0, idx)];
        }
      
        function buildPriorities(dimScores) {
          const sorted = Object.entries(dimScores).sort((a, b) => a[1] - b[1]).slice(0, 3);
      
          const actions = {
            1: {
              label: 'Capacity Utilisation',
              color: 'var(--d1)', bg: 'var(--d1-bg)',
              title: 'Introduce and enforce a cancellation policy',
              desc: 'A clear, consistent cancellation policy is the single fastest way to reduce lost sessions. Clients need to know upfront, and it needs to be applied - not just written.',
              tag: 'Quick win',
              toolkit: 'Book a free call to find out how HartHQ admin support could help your practice.',
              toolkitLink: 'https://hart-hq.zohobookings.com/#/intro'
            },
            2: {
              label: 'Clinical Continuity',
              color: 'var(--d2)', bg: 'var(--d2-bg)',
              title: 'Add a systematic rebooking prompt to every session',
              desc: 'Most dropout happens because the clinician waits for the client to initiate. Leading the rebooking - in session, before they leave - meaningfully changes completion rates.',
              tag: 'High impact',
              toolkit: null
            },
            3: {
              label: 'Revenue Integrity',
              color: 'var(--d3)', bg: 'var(--d3-bg)',
              title: 'Schedule a fee benchmarking review',
              desc: 'Fees often stay flat while costs and market rates move. A deliberate annual review - with local market data - is the simplest way to ensure you\'re being appropriately paid.',
              tag: 'Annual task',
              toolkit: 'Book a free call to find out how HartHQ admin support could help your practice.',
              toolkitLink: 'https://hart-hq.zohobookings.com/#/intro'
            },
            4: {
              label: 'Administrative Load',
              color: 'var(--d4)', bg: 'var(--d4-bg)',
              title: 'Your blended rate is lower than your session rate',
              desc: 'The calculator below shows your real effective hourly rate once you factor in notes and admin time. For most practitioners, the gap is uncomfortable. That gap is your admin load, priced - and it grows every year you don\'t address it.',
              tag: 'Do this today',
              toolkit: 'Practitioners using HartHQ support typically recover 6+ hours per week - time that goes back into client work.',
              toolkitLink: '#calculator'
            },
            5: {
              label: 'Practice Resilience',
              color: 'var(--d5)', bg: 'var(--d5-bg)',
              title: 'Build a basic continuity plan',
              desc: 'Document what happens to your clients, bookings, and admin if you need to step away for 4 weeks. Most practitioners never do this - and it shows when life gets complicated.',
              tag: 'Strategic',
              toolkit: null,
              toolkitLink: null
            }
          };
      
          const container = document.getElementById('priority-cards');
          container.innerHTML = `<div style="font-family:var(--ff-head); font-size:24px; font-weight:400; color:var(--dark); margin-bottom:14px;">Your top 3 priorities</div>`;
      
          sorted.forEach(([dim, score], i) => {
            const a = actions[dim];
            const toolkitHtml = a.toolkit
              ? `<div style="margin-top:10px;padding:10px 12px;background:${a.bg};border-radius:8px;font-size:12px;color:var(--text);font-family:var(--ff-body);">
                  ${a.toolkit} <a href="${a.toolkitLink}" style="color:${a.color};font-weight:600;text-decoration:none;">View →</a>
                 </div>`
              : '';
            container.innerHTML += `
              <div class="priority-card">
                <div class="pc-num" style="color:${a.color};">${i + 1}</div>
                <div class="pc-body">
                  <div class="pc-label" style="color:${a.color};">${a.label}</div>
                  <div class="pc-title">${a.title}</div>
                  <div class="pc-desc">${a.desc}</div>
                  ${toolkitHtml}
                </div>
                <div class="pc-tag" style="background:${a.bg}; color:${a.color};">${a.tag}</div>
              </div>`;
          });
        }
      
        function buildCTA(adminScore, total, dimCaps) {
          const container = document.getElementById('hardhq-cta');
          const maxAdmin = (dimCaps && dimCaps[4]) || 0;
          const adminStress = maxAdmin > 0 && adminScore <= maxAdmin * 0.4;

          let tag, title, desc, btnText, btnHref;

          if (adminStress) {
            tag = 'Your biggest lever - Administrative Load';
            title = 'Your admin load is costing you more than you think.';
            desc = 'Your score suggests you\'re spending significant time on work that doesn\'t need your clinical skills. HartHQ Concierge takes your calls, calendar and invoicing off your plate - practitioners typically recover 6+ hours per week.';
            btnText = 'Enquire about Concierge →';
            btnHref = '#concierge';
          } else if (total <= 55) {
            tag = 'Real room for improvement';
            title = 'A few targeted changes could free up significant time.';
            desc = 'Your score shows a few dimensions under pressure. Book a free 20-minute call to find out if HartHQ admin support is right for your practice.';
            btnText = 'Book a free call →';
            btnHref = 'https://hart-hq.zohobookings.com/#/intro';
          } else if (total <= 75) {
            tag = 'Good foundation - time to plug the gaps';
            title = 'Your practice works. A few targeted fixes would make it exceptional.';
            desc = 'Your score shows a few priorities worth addressing. Book a free 20-minute call to find out if HartHQ admin support is right for your practice.';
            btnText = 'Book a free call →';
            btnHref = 'https://hart-hq.zohobookings.com/#/intro';
          } else {
            tag = 'Strong practice - keep it that way';
            title = 'You\'re running well. The goal now is protecting that.';
            desc = 'Practices at your level often drift when life gets busy. Having admin handled means the wheels keep turning even when you\'re flat out clinically. Book a call if you\'d like to talk through how Concierge could work for you.';
            btnText = 'Book a free call →';
            btnHref = 'https://hart-hq.zohobookings.com/#/intro';
          }
      
          container.innerHTML = `
            <div class="hcta-body">
              <div class="hcta-tag">${tag}</div>
              <div class="hcta-title">${title}</div>
              <div class="hcta-desc">${desc}</div>
            </div>
            <a href="${btnHref}" target="_blank" class="hcta-btn">${btnText}</a>`;
        }
      
        function restartAssessment() {
          scores = initScoresFromDom();
          answeredCount = 0;
          document.querySelectorAll('.opt').forEach(o => o.classList.remove('selected'));
          document.querySelectorAll('.question').forEach(q => q.classList.remove('answered'));
          document.querySelectorAll('.dimension').forEach(d => d.classList.remove('scoring'));
          getDimsInOrder().forEach((d) => {
            const el = document.getElementById(`score-d${d}`);
            if (el) {
              el.textContent = '-';
            }
          });
          document.getElementById('progress-fill').style.width = '0%';
          const tq = getTotalQuestions();
          document.getElementById('progress-count').textContent = `0 of ${tq} answered`;
          const sw = document.getElementById('submit-wrap');
          if (sw) {
            sw.classList.remove('visible');
            sw.style.display = '';
            sw.hidden = true;
          }
          const results = document.getElementById('results');
          results.style.display = 'none';
          results.classList.remove('visible');
          showStepAt(0);
          window.scrollTo({ top: 0, behavior: 'smooth' });
        }
      
        function updateMiniCalc() {
          const fee      = parseFloat(document.getElementById('calc-fee').value) || 0;
          const sessions = parseFloat(document.getElementById('calc-sessions').value) || 0;
          const admin    = parseFloat(document.getElementById('calc-admin').value) || 0;
          const weeks    = parseFloat(document.getElementById('calc-weeks').value) || 46;
          const HARDHQ_WK  = 250;
          const ADMIN_AFTER = 2;
      
          // Notes estimated at 30 min per session
          const notes = sessions * 0.5;
      
          // Update notes hint
          document.getElementById('notes-hint').textContent = '+ ' + notes.toFixed(1) + ' hrs notes + prep est.';
      
          // Week breakdown
          const totalHrs = sessions + notes + admin;
          document.getElementById('wb-sessions').textContent = sessions + ' hrs';
          document.getElementById('wb-notes').textContent    = notes.toFixed(1) + ' hrs';
          document.getElementById('wb-admin').textContent    = admin + ' hrs';
          document.getElementById('wb-total').textContent    = totalHrs.toFixed(1) + ' hrs';
      
          // Existing calcs
          const adminCost = admin * fee * weeks;
          const hrsSaved  = Math.max(0, admin - ADMIN_AFTER);
          const extraRev  = hrsSaved * 0.75 * fee * weeks;
          const netGain   = extraRev - (HARDHQ_WK * weeks);
          const fmt = n => '$' + Math.round(Math.abs(n)).toLocaleString();
      
          document.getElementById('mc-cost').textContent  = fmt(adminCost);
          document.getElementById('mc-hours').textContent = hrsSaved + ' hrs';
      
          // Fix: show negative net gain correctly
          if (netGain > 0) {
            document.getElementById('mc-gain').textContent = '+' + fmt(netGain);
            document.getElementById('mc-gain').style.color = 'var(--teal)';
            document.getElementById('mc-gain-sub').textContent = 'after HartHQ from $250/wk';
          } else {
            document.getElementById('mc-gain').textContent = '-' + fmt(netGain);
            document.getElementById('mc-gain').style.color = '#e05555';
            document.getElementById('mc-gain-sub').textContent = 'not enough admin to offset cost';
          }
      
          // Blended rates - use weekly figures throughout
          const weeklyRev = sessions * fee;
          const fmtRate = n => n > 0 ? '$' + Math.round(n) + '/hr' : '-';
      
          // Now: weekly revenue / total hours this week
          const blendedNow = totalHrs > 0 ? weeklyRev / totalHrs : 0;
      
          // Admin off plate: same revenue, hours reduced to ADMIN_AFTER
          const totalAfterAdmin = sessions + notes + ADMIN_AFTER;
          const blendedMid = totalAfterAdmin > 0 ? weeklyRev / totalAfterAdmin : 0;
      
          // Admin off + hours filled: extra sessions in saved time (75% fill)
          const extraSessions = hrsSaved * 0.75;
          const weeklyRevFilled = (sessions + extraSessions) * fee;
          const blendedBest = totalAfterAdmin > 0 ? weeklyRevFilled / totalAfterAdmin : 0;
      
          document.getElementById('mc-blended-now').textContent  = fmtRate(blendedNow);
          document.getElementById('mc-blended-mid').textContent  = fmtRate(blendedMid);
          document.getElementById('mc-blended-best').textContent = fmtRate(blendedBest);
        }
      
        function showEmailModal() {
          const modal = document.getElementById('email-modal');
          modal.style.display = 'flex';
        }
      
        function hideEmailModal() {
          document.getElementById('email-modal').style.display = 'none';
        }
      
        function sendResultsEmail() {
          const email = document.getElementById('email-input').value.trim();
          if (!email) {
            document.getElementById('email-input').style.borderColor = '#e05555';
            return;
          }

          // Build score summary (labels from rendered dimension titles)
          const score = document.getElementById('final-score').textContent;
          const band  = document.getElementById('score-band').textContent;
          const dimBodyLines = getDimsInOrder().map((d) => {
            const title = document.querySelector(`#dim-${d} .dim-title`);
            const label = title && title.textContent ? title.textContent.trim() : ('Dimension ' + d);
            const el = document.getElementById('bar-score-' + d);
            return label + ': ' + (el ? el.textContent : '-');
          }).join('\n');

          const subject = encodeURIComponent('My HartBeat Score - ' + score + '/100');
          const body = encodeURIComponent(
            'HartBeat Score: ' + score + '/100 (' + band + ')' +
            '\n\nScore by dimension:\n' +
            dimBodyLines +
            '\n\n---\nGenerated by HartBeat at harthq.com.au' +
            '\nBook a free call: https://hart-hq.zohobookings.com/#/intro'
          );

          const cfg = typeof harthqHeartBeatLead !== 'undefined' ? harthqHeartBeatLead : null;
          const openMailto = function() {
            window.location.href = 'mailto:' + email
              + '?cc=hq%40thehartcentre.com.au'
              + '&subject=' + subject
              + '&body=' + body;
            hideEmailModal();
          };

          if (cfg && cfg.ajaxUrl && cfg.nonce && cfg.action) {
            const fd = new FormData();
            fd.append('action', cfg.action);
            fd.append('nonce', cfg.nonce);
            fd.append('email', email);
            fd.append('score', score);
            fd.append('band', band);
            fd.append('dimensions', dimBodyLines);
            fetch(cfg.ajaxUrl, { method: 'POST', body: fd, credentials: 'same-origin' })
              .catch(function() { /* non-blocking */ })
              .finally(openMailto);
          } else {
            openMailto();
          }
        }
      
        // Close modal on backdrop click
        document.getElementById('email-modal').addEventListener('click', function(e) {
          if (e.target === this) hideEmailModal();
        });
      
        function buildBurnoutIndicator(dimScores, score100, dimCaps) {
          let risk = 0;
          const maxAdmin = (dimCaps && dimCaps[4]) || 0;
          const admin = dimScores[4] || 0;
          const adminPct = maxAdmin > 0 ? admin / maxAdmin : 0;
          if (adminPct <= 0.4)      risk += 3;
          else if (adminPct <= 0.6) risk += 2;
          else if (adminPct <= 0.8) risk += 1;

          const maxCont = (dimCaps && dimCaps[2]) || 0;
          const continuity = dimScores[2] || 0;
          const contPct = maxCont > 0 ? continuity / maxCont : 0;
          if (contPct <= 0.4)      risk += 2;
          else if (contPct <= 0.6) risk += 1;

          if (score100 <= 40)      risk += 2;
          else if (score100 <= 55) risk += 1;
      
          // Also check calculator if filled in
          const sessionsEl = document.getElementById('calc-sessions');
          const adminEl    = document.getElementById('calc-admin');
          const notesHrs   = sessionsEl ? (parseFloat(sessionsEl.value) || 0) * 0.5 : 0;
          const adminHrs   = adminEl ? (parseFloat(adminEl.value) || 0) : 0;
          const totalHrs   = (parseFloat(sessionsEl?.value) || 0) + notesHrs + adminHrs;
          if (totalHrs > 50)      risk += 2;
          else if (totalHrs > 40) risk += 1;
      
          let level, label, text;
      
          if (risk <= 3) {
            level = 'low';
            label = 'Low burnout risk';
            text  = 'Your responses don\'t suggest immediate burnout risk. Worth keeping an eye on your admin load - it\'s the dimension most likely to shift this over time.';
          } else if (risk <= 6) {
            level = 'moderate';
            label = 'Moderate burnout risk';
            text  = 'Your responses suggest a moderate burnout risk. The combination of administrative work and clinical load you\'re currently carrying is significant. This is worth taking seriously - not as a crisis, but as a signal worth acting on before it becomes one.';
          } else {
            level = 'high';
            label = 'High burnout risk';
            text  = 'Your responses suggest a high burnout risk. The weight of what you\'re carrying - clinically and administratively - is a lot. You probably already know this. The admin piece is the one lever you can actually pull right now.';
          }
      
          document.getElementById('burnout-indicator').innerHTML = `
            <div class="burnout-flag ${level}">
              <div class="bf-dot"></div>
              <div>
                <div class="bf-label">${label}</div>
                <div class="bf-text">${text}</div>
              </div>
            </div>`;
        }

        // heartbeat.php uses inline onclick; those handlers resolve on window.
        window.selectOpt = selectOpt;
        window.showResults = showResults;
        window.restartAssessment = restartAssessment;
        window.showEmailModal = showEmailModal;
        window.hideEmailModal = hideEmailModal;
        window.sendResultsEmail = sendResultsEmail;
        window.updateMiniCalc = updateMiniCalc;

        bindDimStepNav();
        showStepAt(0, { scroll: false });
    } catch (err) {
      console.error('Script error on heartbeat page:', err);
    }
  }

})();

