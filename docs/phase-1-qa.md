# Phase 1 Post-Launch QA

This checklist covers only the first post-launch technical cleanup batch. It does not authorize deployment by itself.

## Routing and status codes

- [ ] `https://www.jovelcreative.com/` returns one 301 to `https://jovelcreative.com/`.
- [ ] A `www` interior URL preserves its path and query string when redirected.
- [ ] `https://jovelcreative.com/index.html` returns one 301 to `https://jovelcreative.com/`.
- [ ] Existing legacy redirects still return one 301 to their intended clean URLs.
- [ ] A made-up path returns HTTP 404 and renders the branded Jovel Creative 404 page.
- [ ] Protected paths under `/includes`, `/private-config`, `/vendor` and `/docs` remain inaccessible.

## Social metadata

- [ ] Homepage source contains `og:image`, `og:image:width`, `og:image:height` and matching Twitter/X image metadata.
- [ ] Social image resolves at `/images/jovel-creative-social-card.png`.
- [ ] Social preview image is 1200 x 630 and visually legible.
- [ ] Facebook/LinkedIn-style preview uses the intended title, description and image when re-scraped after deployment.

## Start a Project form

- [ ] Text, email, telephone, date, select and textarea boundaries are visibly clear against white.
- [ ] Keyboard focus remains clearly visible.
- [ ] Valid synthetic submission reaches the configured Jovel Creative mailbox.
- [ ] Success redirects to `/start-a-project?status=sent` and displays the success status message.
- [ ] Invalid submission redirects to `/start-a-project?status=invalid` and displays the error alert.
- [ ] Reply-To uses the entered synthetic email address.
- [ ] No sensitive production SMTP exception text is written by the catch block.

## Regression checks

- [ ] Home, Services, Examples, Pricing, About, FAQ, Start a Project, Privacy, Terms, Accessibility and the AYS case study render normally.
- [ ] Mobile navigation opens, closes, closes on Escape and clears state when returning to desktop width.
- [ ] Footer navigation remains available.
- [ ] Canonical URLs remain non-www HTTPS clean URLs.
- [ ] `robots.txt` and `sitemap.xml` still resolve.
- [ ] Search Console sitemap remains successful.

## Deployment gate

Do not merge to `main` until routing, 404 behavior, social metadata, form behavior and the public-page regression checks pass on a Hostinger-equivalent runtime or immediately after a controlled production deploy with rollback ready.
