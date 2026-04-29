/* Combined scripts from source HTML files */
(function () {
  const path = window.location.pathname.toLowerCase();
  const isHome = path === '/' || path === '';
  const isAbout = path.indexOf('/about') !== -1;
  const isHeartbeat = path.indexOf('/heartbeat') !== -1 || path.indexOf('/hartbeat') !== -1;
  const isPrivacy = path.indexOf('/privacy') !== -1;

  if (isHome) {
    try {
      // Nav scroll effect
      const nav = document.getElementById('nav');
      window.addEventListener('scroll', () => {
        nav.classList.toggle('scrolled', window.scrollY > 40);
      });
      
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
    } catch (err) {
      console.error('Script error on homepage page:', err);
    }
  }

  if (isAbout) {
    try {
      const nav = document.getElementById('nav');
      window.addEventListener('scroll', () => {
        nav.classList.toggle('scrolled', window.scrollY > 40);
      });
      
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
      const scores = { 1: {}, 2: {}, 3: {}, 4: {}, 5: {} };
        const totalQuestions = 20;
        let answeredCount = 0;
      
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
          const vals = Object.values(scores[dim]);
          const total = vals.reduce((a, b) => a + b, 0);
          const dimEl = document.getElementById(`dim-${dim}`);
          document.getElementById(`score-d${dim}`).textContent = total;
          dimEl.classList.add('scoring');
        }
      
        function updateProgress() {
          const pct = (answeredCount / totalQuestions) * 100;
          document.getElementById('progress-fill').style.width = pct + '%';
          document.getElementById('progress-count').textContent = `${answeredCount} of ${totalQuestions} answered`;
          const submitWrap = document.getElementById('submit-wrap');
          if (answeredCount === totalQuestions) {
            submitWrap.classList.add('visible');
            submitWrap.scrollIntoView({ behavior: 'smooth', block: 'center' });
          }
        }
      
        function showResults() {
          const dimScores = {};
          let total = 0;
          for (let d = 1; d <= 5; d++) {
            const s = Object.values(scores[d]).reduce((a, b) => a + b, 0);
            dimScores[d] = s;
            total += s;
          }
      
          document.getElementById('submit-wrap').style.display = 'none';
      
          const band = getBand(total);
          const finalScoreEl = document.getElementById('final-score');
          finalScoreEl.innerHTML = `${total}<span class="score-max">/100</span>`;
          finalScoreEl.style.color = band.color;
          document.getElementById('score-band').textContent = band.band;
          document.getElementById('score-band').style.color = band.color;
          document.getElementById('score-desc').textContent = band.desc;
      
          // Animate bars
          setTimeout(() => {
            for (let d = 1; d <= 5; d++) {
              const s = dimScores[d];
              document.getElementById(`bar-score-${d}`).textContent = `${s}/20`;
              document.getElementById(`bar-fill-${d}`).style.width = `${(s / 20) * 100}%`;
              document.getElementById(`bar-insight-${d}`).textContent = getDimInsight(d, s);
            }
          }, 300);
      
          buildPriorities(dimScores);
          buildCTA(dimScores[4], total);
          buildBurnoutIndicator(dimScores, total);
      
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
      
        function getDimInsight(dim, score) {
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
          const idx = Math.min(Math.floor((score - 1) / 4), 4);
          return insights[dim][Math.max(0, idx)];
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
          container.innerHTML = `<div style="font-family:var(--ff-head); font-size:22px; font-weight:400; color:var(--dark); margin-bottom:14px;">Your top 3 priorities</div>`;
      
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
      
        function buildCTA(adminScore, total) {
          const container = document.getElementById('hardhq-cta');
      
          let tag, title, desc, btnText, btnHref;
      
          if (adminScore <= 8) {
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
            <a href="${btnHref}" class="hcta-btn">${btnText}</a>`;
        }
      
        function restartAssessment() {
          for (let d = 1; d <= 5; d++) scores[d] = {};
          answeredCount = 0;
          document.querySelectorAll('.opt').forEach(o => o.classList.remove('selected'));
          document.querySelectorAll('.question').forEach(q => q.classList.remove('answered'));
          document.querySelectorAll('.dimension').forEach(d => d.classList.remove('scoring'));
          for (let d = 1; d <= 5; d++) {
            document.getElementById(`score-d${d}`).textContent = '-';
          }
          document.getElementById('progress-fill').style.width = '0%';
          document.getElementById('progress-count').textContent = '0 of 20 answered';
          const sw = document.getElementById('submit-wrap');
          sw.classList.remove('visible');
          sw.style.display = '';
          const results = document.getElementById('results');
          results.style.display = 'none';
          results.classList.remove('visible');
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
      
          // Build score summary
          const score = document.getElementById('final-score').textContent;
          const band  = document.getElementById('score-band').textContent;
          const dimLabels = {1:'Capacity Utilisation',2:'Clinical Continuity',3:'Revenue Integrity',4:'Administrative Load',5:'Practice Resilience'};
          let dimLines = '';
          for (let d = 1; d <= 5; d++) {
            const s = document.getElementById('bar-score-' + d);
            if (s) dimLines += dimLabels[d] + ': ' + s.textContent + '%0A';
          }
      
          const subject = encodeURIComponent('My HartBeat Score - ' + score + '/100');
          const body = encodeURIComponent(
            'HartBeat Score: ' + score + '/100 (' + band + ')' +
            '\n\nScore by dimension:\n' +
            Object.entries(dimLabels).map(([d, label]) => {
              const el = document.getElementById('bar-score-' + d);
              return label + ': ' + (el ? el.textContent : '-');
            }).join('\n') +
            '\n\n---\nGenerated by HartBeat at harthq.com.au' +
            '\nBook a free call: https://hart-hq.zohobookings.com/#/intro'
          );
      
          // mailto opens their email client, CC'd to HartHQ
          window.location.href = 'mailto:' + email
            + '?cc=hq%40thehartcentre.com.au'
            + '&subject=' + subject
            + '&body=' + body;
      
          hideEmailModal();
        }
      
        // Close modal on backdrop click
        document.getElementById('email-modal').addEventListener('click', function(e) {
          if (e.target === this) hideEmailModal();
        });
      
        function buildBurnoutIndicator(dimScores, total) {
          let risk = 0;
      
          // Admin load - strongest signal (dim 4, lower = worse)
          const admin = dimScores[4];
          if (admin <= 8)       risk += 3;
          else if (admin <= 12) risk += 2;
          else if (admin <= 16) risk += 1;
      
          // Clinical continuity - reactive practice = stress (dim 2)
          const continuity = dimScores[2];
          if (continuity <= 8)       risk += 2;
          else if (continuity <= 12) risk += 1;
      
          // Overall score - struggling across the board
          if (total <= 40)      risk += 2;
          else if (total <= 55) risk += 1;
      
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
      
        // Scroll reveal
        const observer = new IntersectionObserver((entries) => {
          entries.forEach(e => { if (e.isIntersecting) e.target.classList.add('visible'); });
        }, { threshold: 0.08 });
        document.querySelectorAll('.dimension').forEach(d => observer.observe(d));
    } catch (err) {
      console.error('Script error on heartbeat page:', err);
    }
  }

  if (isPrivacy) {
    try {
    } catch (err) {
      console.error('Script error on privacy page:', err);
    }
  }

})();
