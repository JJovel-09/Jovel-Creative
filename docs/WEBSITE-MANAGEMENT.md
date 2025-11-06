# Website Management Guide

Complete guide for customizing, maintaining, and creating content for your Jovel Creative website.

## Table of Contents

1. [Customization Guide](#customization-guide)
2. [Content Guidelines](#content-guidelines)
3. [Maintenance Guide](#maintenance-guide)

---

# Part 1: Customization Guide

## Changing Colors

### Step 1: Locate Color Variables

1. Open `/css/styles.css`
2. Find the `:root` section at the top (lines 10-30)
3. You'll see color definitions like:

```css
:root {
  --color-primary: #1a365d;        /* Deep Navy */
  --color-accent: #f97316;         /* Orange */
  /* ... more colors ... */
}
```

### Step 2: Choose New Colors

Use a color picker tool:
- [Coolors.co](https://coolors.co/) - Generate palettes
- [Adobe Color](https://color.adobe.com/) - Create harmonious colors
- [HTML Color Codes](https://htmlcolorcodes.com/) - Pick and convert colors

### Step 3: Update Color Values

Replace the hex codes:

```css
/* OLD */
--color-primary: #1a365d;     /* Deep Navy */
--color-accent: #f97316;      /* Orange */

/* NEW - Example with Purple/Teal */
--color-primary: #5b21b6;     /* Purple */
--color-accent: #14b8a6;      /* Teal */
```

### Step 4: Test and Save

1. Save the file
2. Upload to your server
3. Clear browser cache (Ctrl+F5)
4. Check all pages to ensure colors look good

### Quick Color Reference

**Primary Color** (Navy Blue): Used for headers, nav, footer
**Accent Color** (Orange): Used for buttons, links, CTAs
**Neutral Colors**: Backgrounds and text

**Pro Tip**: Only change primary and accent colors. Leave neutral colors as-is.

---

## Changing Fonts

### Current Fonts

Your site uses **Inter** for all text (clean, modern, professional).

### Option A: Change to Different Google Font

1. Visit [Google Fonts](https://fonts.google.com/)
2. Choose a font (e.g., "Roboto", "Open Sans", "Montserrat")
3. Click "Get font" → "Get embed code"
4. Copy the `<link>` code

**Update HTML Files:**

Find this in `<head>` section of each HTML file:
```html
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
```

Replace with your new font:
```html
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
```

**Update CSS:**

In `/css/styles.css`, find:
```css
--font-primary: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
```

Change to:
```css
--font-primary: 'Roboto', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
```

### Option B: Use Different Fonts for Headings vs Body

```css
--font-heading: 'Montserrat', sans-serif;  /* Bold, modern headings */
--font-primary: 'Open Sans', sans-serif;   /* Clean, readable body text */
```

Don't forget to add both fonts to your HTML `<link>` tags!

---

## Adding New Portfolio Projects

### Step 1: Prepare Content

**You Need:**
- Project title
- Description (2-3 sentences)
- Key features (bullet list)
- Industry
- Technologies used
- Image (1200x800px recommended)

### Step 2: Add Image

1. Optimize your image with [TinyPNG](https://tinypng.com/)
2. Name it descriptively: `portfolio-client-name-website.jpg`
3. Upload to `/images/` folder
4. Add ALT text description for SEO

### Step 3: Add HTML

Open `portfolio.html` and find the portfolio grid section.

Copy this template and paste it in the grid:

```html
<article class="portfolio-item fade-in" itemscope itemtype="https://schema.org/CreativeWork">
  <img
    src="/images/portfolio-your-project.jpg"
    alt="Descriptive ALT text including location if local client"
    class="portfolio-image"
    width="400"
    height="250"
    loading="lazy"
    itemprop="image">
  <div class="portfolio-content">
    <h3 itemprop="name">Your Project Title</h3>

    <p itemprop="description">
      Your project description here. Explain what you built, for whom, and what
      results they achieved. Mention location if it's a local Frederick/Montgomery
      County client for SEO.
    </p>

    <div style="margin: var(--space-4) 0;">
      <h4 style="font-size: var(--text-base); margin-bottom: var(--space-2);">Key Features:</h4>
      <ul style="color: var(--color-neutral-700); margin-left: var(--space-6); line-height: var(--leading-loose);">
        <li>Feature 1</li>
        <li>Feature 2</li>
        <li>Feature 3</li>
      </ul>
    </div>

    <div style="margin: var(--space-4) 0;">
      <p style="font-size: var(--text-sm); color: var(--color-neutral-600); margin-bottom: var(--space-2);">
        <strong>Industry:</strong> [Industry Name]
      </p>
      <p style="font-size: var(--text-sm); color: var(--color-neutral-600); margin-bottom: var(--space-4);">
        <strong>Project Type:</strong> [Type]
      </p>
    </div>

    <div class="portfolio-tags">
      <span class="tag">HTML5</span>
      <span class="tag">CSS3</span>
      <span class="tag">JavaScript</span>
      <span class="tag">Your Technology</span>
    </div>

    <div style="margin-top: var(--space-6);">
      <a href="/contact.html" class="btn btn-primary" id="portfolio-cta-X">Start Your Project</a>
    </div>
  </div>
</article>
```

### Step 4: Update Homepage Preview

Update the 3 portfolio preview items on `index.html` to show your latest work.

---

## Updating Contact Information

### Where to Update

Contact info appears in multiple places:

**1. Header Navigation** (all pages)
- No direct contact info, just CTA button

**2. Footer** (all pages)
- Email, phone, location, hours

**3. Contact Page**
- Full NAP (Name, Address, Phone)
- Google Map
- Business hours

**4. Schema Markup** (homepage, contact page)
- LocalBusiness JSON-LD

### How to Update

**Search and Replace:**
1. Open each HTML file
2. Find: `240-579-7858`
3. Replace with: Your new phone number
4. Find: `juan@jovelcreative.com`
5. Replace with: Your new email

**Update All Instances:**
- Phone: `240-579-7858` and `tel:+12405797858`
- Email: `juan@jovelcreative.com` and `mailto:juan@jovelcreative.com`
- Address: `Frederick, MD 21704`
- Hours: `Monday-Friday 9am-6pm`

---

## Updating Service Pricing

### Location

Open `services.html`, find the pricing cards (around line 150).

### Update Prices

Find each pricing card and update:

```html
<div class="pricing-price">$2,000</div>
```

Change to your new price:

```html
<div class="pricing-price">$2,500</div>
```

**Remember**: Also update the homepage pricing preview!

### Adding/Removing Features

In the `<ul class="pricing-features">` list:

**Add Feature:**
```html
<li>New feature description here</li>
```

**Remove Feature:**
Delete the entire `<li>` line

---

## Adding a New Page

### Step 1: Create HTML File

1. Copy `about.html` as a template
2. Rename to `your-new-page.html`
3. Update content

### Step 2: Update Meta Tags

Change these in the `<head>`:
- Title tag
- Meta description
- Open Graph tags
- Canonical URL

### Step 3: Update Schema Markup

Add BreadcrumbList schema:

```html
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [
    {
      "@type": "ListItem",
      "position": 1,
      "name": "Home",
      "item": "https://jovelcreative.com/"
    },
    {
      "@type": "ListItem",
      "position": 2,
      "name": "Your Page Name",
      "item": "https://jovelcreative.com/your-new-page.html"
    }
  ]
}
</script>
```

### Step 4: Add to Navigation

In ALL HTML files, add your page to the nav:

```html
<li><a href="/your-new-page.html" class="nav-link">Your Page</a></li>
```

### Step 5: Add to Sitemap

Open `sitemap.xml` and add:

```xml
<url>
  <loc>https://jovelcreative.com/your-new-page.html</loc>
  <lastmod>2025-01-15</lastmod>
  <changefreq>monthly</changefreq>
  <priority>0.7</priority>
</url>
```

### Step 6: Upload and Test

1. Upload new file
2. Test navigation from all pages
3. Resubmit sitemap to Google Search Console

---

# Part 2: Content Guidelines

## SEO-Friendly Content Writing

### Keyword Placement

For each page, choose one primary keyword. Place it in:

1. **Title tag** (beginning)
2. **H1** (naturally)
3. **First paragraph** (within first 100 words)
4. **At least one H2 or H3**
5. **Image ALT text** (where relevant)
6. **Meta description**

**Example:**

```html
<!-- Title -->
<title>Web Developer Frederick MD | Custom Websites | Jovel Creative</title>

<!-- H1 -->
<h1>Professional Web Developer Serving Frederick, Maryland</h1>

<!-- First Paragraph -->
<p>Looking for a web developer in Frederick, MD? Jovel Creative builds custom websites...</p>

<!-- H2 -->
<h2>Why Choose Our Frederick Web Development Services?</h2>
```

### Keyword Density

- **Target**: 1-2% keyword density
- **Natural usage**: Don't force it!
- Use variations:
  - "web developer Frederick MD"
  - "Frederick web development services"
  - "website designer in Frederick"

### Word Count Guidelines

- **Homepage**: 500-800 words
- **Services Page**: 1,000-1,500 words
- **Portfolio Page**: 300-500 words (mostly visual)
- **About Page**: 500-800 words
- **Contact Page**: 200-300 words
- **Blog Posts** (if added): 800-1,500 words

## Writing for Users AND Search Engines

### Good SEO Content Is:

1. **Valuable** - Answers user questions
2. **Unique** - Not copied from anywhere
3. **Well-Structured** - Clear headings, short paragraphs
4. **Scannable** - Bullet points, bold important info
5. **Actionable** - Clear next steps/CTAs
6. **Local** - Mentions Frederick/Montgomery County naturally

### Content Structure Template

```
H1: Main Topic with Keyword
- Opening paragraph with keyword
- Problem statement

H2: First Major Section
- Supporting content
- Examples or bullet points

H2: Second Major Section
- More valuable information
- Visual elements (images, lists)

H2: Call to Action
- Clear next step
- Contact information
```

## Image Optimization for SEO

### File Names

**Bad:**
- `IMG_1234.jpg`
- `screenshot.png`
- `image1.jpg`

**Good:**
- `frederick-web-developer-juan-jovel.jpg`
- `custom-website-design-example.png`
- `montgomery-county-business-website.jpg`

### ALT Text Guidelines

**Format**: `[What it shows] + [Context/Location if relevant]`

**Bad:**
- `<img src="photo.jpg" alt="photo">`
- `<img src="website.jpg" alt="website">`

**Good:**
- `<img src="portfolio-1.jpg" alt="Modern portfolio website design for Frederick creative professional">`
- `<img src="juan-jovel.jpg" alt="Juan Jovel, web developer and owner of Jovel Creative in Frederick, Maryland">`

### Image Sizes

**Before uploading:**
1. Resize to appropriate dimensions
2. Hero images: 1920x1080px max
3. Portfolio thumbnails: 800x600px
4. Compress with [TinyPNG](https://tinypng.com/)
5. Aim for under 200KB per image

---

# Part 3: Maintenance Guide

## Daily Tasks

**Check if you receive:**
- [ ] Contact form submissions (check Formspree email)
- [ ] Any error notifications from hosting

**That's it!** Your site is low-maintenance.

## Weekly Tasks (15 minutes)

**Monday Morning Routine:**

1. **Test Contact Form** (2 min)
   - Submit a test inquiry
   - Verify you receive it

2. **Check Uptime** (1 min)
   - Visit your site - does it load?
   - If using UptimeRobot, check for downtime alerts

3. **Quick Mobile Test** (2 min)
   - Open site on your phone
   - Test one or two pages

4. **Review Analytics** (5 min)
   - Google Analytics → Realtime
   - Any visitors right now?
   - Any issues?

5. **Check Google Business Profile** (5 min)
   - Any new reviews? Respond!
   - Any new questions? Answer!

## Monthly Tasks (1-2 hours)

**First Monday of Each Month:**

### 1. Analytics Review (20 min)

Open Google Analytics:

- [ ] Total visitors vs last month (increasing?)
- [ ] Top traffic sources (organic search growing?)
- [ ] Most viewed pages
- [ ] Conversions (form submissions, calls)
- [ ] Device breakdown (mobile vs desktop)
- [ ] Download monthly report PDF

### 2. Search Console Review (15 min)

Open Google Search Console:

- [ ] Total impressions and clicks
- [ ] Average position for target keywords
- [ ] Any crawl errors? Fix them!
- [ ] Any mobile usability issues?
- [ ] New backlinks?

### 3. Google Business Profile Update (15 min)

- [ ] Post monthly update (news, tip, promotion)
- [ ] Add 2-3 new photos
- [ ] Respond to any reviews
- [ ] Check insights (views, actions)

### 4. Content Update (20 min)

- [ ] Update one page with fresh content
- [ ] Add new portfolio item (if available)
- [ ] Update any outdated information
- [ ] Check all CTAs still relevant

### 5. Technical Check (20 min)

- [ ] Run [PageSpeed Insights](https://pagespeed.web.dev/) - still 90+?
- [ ] Check for broken links with [Broken Link Checker](https://www.brokenlinkcheck.com/)
- [ ] Test contact form (full submission)
- [ ] Check SSL certificate (should auto-renew, but verify)

### 6. Backup (10 min)

- [ ] Download full site backup via FTP or Hostinger
- [ ] Save as `backup-YYYY-MM-DD.zip`
- [ ] Store in safe location (Google Drive, Dropbox, external drive)

## Quarterly Tasks (2-3 hours)

**Every 3 Months:**

### 1. Comprehensive SEO Audit

- [ ] Review all meta tags - still optimized?
- [ ] Check keyword rankings - improving?
- [ ] Audit backlinks - any toxic links to disavow?
- [ ] Review top 3 competitors - what are they doing?
- [ ] Update keyword strategy based on performance

### 2. Content Refresh

- [ ] Update homepage with latest information
- [ ] Refresh portfolio with newest projects
- [ ] Update testimonials (add new ones)
- [ ] Review service pricing - still competitive?
- [ ] Check all dates/copyright years

### 3. Technical Maintenance

- [ ] Update Formspree settings if needed
- [ ] Review hosting plan - enough resources?
- [ ] Check email deliverability (test form submissions)
- [ ] Review analytics setup - tracking correctly?
- [ ] Test site on new devices/browsers

### 4. Local SEO Maintenance

- [ ] Submit to 5 new directories
- [ ] Verify NAP consistency across top 20 citations
- [ ] Update Google Business Profile categories/attributes
- [ ] Request reviews from recent clients
- [ ] Check local rankings for target keywords

## Annual Tasks

**Once Per Year:**

- [ ] Renew domain name
- [ ] Renew hosting plan
- [ ] Review and update privacy policy (if you add one)
- [ ] Update copyright year in footer
- [ ] Complete site redesign assessment (do you need updates?)
- [ ] Review pricing strategy
- [ ] Audit entire website for outdated content
- [ ] Consider adding new features (blog, booking system, etc.)

---

## Handling Form Submissions

### You Receive a Contact Form Submission

**Within 24 Hours:**

1. **Read the inquiry carefully**
   - What service are they interested in?
   - What's their budget?
   - What's their timeline?
   - Are they in Frederick/Montgomery County?

2. **Respond promptly**

**Email Template:**

```
Subject: Re: Website Inquiry - Let's Discuss Your Project

Hi [Name],

Thank you for reaching out to Jovel Creative! I'm excited to learn more about your [business type] and how I can help you with your website.

Based on your message, it sounds like the [Package Name] would be a great fit for your needs. This includes:
- [Key feature relevant to their request]
- [Another relevant feature]
- [Timeline: X weeks]

I'd love to schedule a brief 15-minute call to discuss your project in detail and answer any questions.

When works best for you? I'm available:
- [Time slot 1]
- [Time slot 2]
- [Time slot 3]

Or feel free to call me directly at 240-579-7858.

Looking forward to working with you!

Best regards,
Juan Jovel
Jovel Creative
240-579-7858
https://jovelcreative.com
```

3. **Follow up if no response**
   - Wait 3 days
   - Send friendly follow-up
   - Ask if they're still interested or have questions

---

## Troubleshooting Common Issues

### Site Is Down

**Steps:**
1. Check if it's just you: Use [Down For Everyone Or Just Me](https://downforeveryoneorjustme.com/)
2. Check hosting account - any issues?
3. Contact Hostinger support immediately
4. Check domain expiration date
5. Check DNS settings

### Forms Stopped Working

**Check:**
1. Formspree account - any issues?
2. Did Formspree form limit reached (free tier)?
3. Browser console for JavaScript errors
4. Test with different browser/device
5. Check Formspree email - did they send you warnings?

### Rankings Dropped

**Don't Panic! Check:**
1. Google Search Console - any penalties?
2. Any manual actions?
3. Competitor activity - did they launch new content?
4. Google algorithm update? (Check [SE Roundtable](https://www.seroundtable.com/))
5. Are you still appearing in "Map Pack"?

Usually rankings fluctuate. Wait 2 weeks, monitor, then adjust.

### Spam Form Submissions

**Solutions:**
1. Add honeypot field to form (invisible to humans, catches bots)
2. Upgrade Formspree plan for better spam protection
3. Enable reCAPTCHA
4. Don't publicly display email address (use contact form only)

---

## Monthly Maintenance Checklist (Printable)

```
[ ] Week 1: Test forms, check uptime, review GBP
[ ] Week 2-4: Monitor Analytics casually

MONTHLY (1st Monday):
[ ] Analytics Review
[ ] Search Console Review
[ ] GBP Update (post + photos)
[ ] Content Update
[ ] Technical Check (PageSpeed, broken links)
[ ] Backup Site

QUARTERLY (Every 3 Months):
[ ] SEO Audit
[ ] Content Refresh
[ ] Local SEO Maintenance

ANNUAL (Once Per Year):
[ ] Renew domain/hosting
[ ] Update copyright year
[ ] Complete site audit
```

---

## Need Help?

- **Hosting Issues**: Hostinger Support (24/7 chat)
- **Form Issues**: Formspree Support (support@formspree.io)
- **SEO Questions**: Google Search Central Help
- **Design Changes**: Review this guide or hire a developer
- **Emergency**: Contact juan@jovelcreative.com or 240-579-7858

---

## Resources

**Free Tools:**
- [Google PageSpeed Insights](https://pagespeed.web.dev/) - Performance
- [Google Mobile-Friendly Test](https://search.google.com/test/mobile-friendly) - Mobile optimization
- [Broken Link Checker](https://www.brokenlinkcheck.com/) - Find broken links
- [TinyPNG](https://tinypng.com/) - Image compression
- [Coolors](https://coolors.co/) - Color palette generator

**Documentation:**
- [Google Search Console Help](https://support.google.com/webmasters)
- [Google Analytics Help](https://support.google.com/analytics)
- [Hostinger Tutorials](https://support.hostinger.com/)

---

**Remember**: Consistency beats perfection. Do a little maintenance regularly rather than neglecting it for months!

**Last Updated**: January 2025
