# Deployment Guide - Jovel Creative Website

Complete guide to deploying your website to Hostinger or any web hosting provider.

## Pre-Deployment Checklist

Before uploading, ensure:

- [ ] All HTML files have correct domain in meta tags and schema
- [ ] Google Analytics Measurement ID is added
- [ ] Formspree form ID is added to contact form
- [ ] All images are optimized and have ALT text
- [ ] Sitemap.xml has correct domain
- [ ] Robots.txt has correct sitemap URL
- [ ] .htaccess file is present
- [ ] All links are tested locally

---

## Option 1: Hostinger Deployment (File Manager)

### Step 1: Access Your Hosting Account

1. Log in to Hostinger control panel (hPanel)
2. Find your domain in the list
3. Click **"File Manager"**

### Step 2: Navigate to Public Directory

1. In File Manager, navigate to `public_html` (or `www` or `htdocs` - depends on host)
2. This is your website root directory
3. Delete any placeholder `index.html` if present

### Step 3: Upload Files

**Using File Manager:**

1. Click **"Upload Files"** button
2. **Select all your website files:**
   - All .html files (index.html, services.html, etc.)
   - css folder
   - js folder
   - images folder
   - sitemap.xml
   - robots.txt
   - .htaccess
3. Upload and wait for completion
4. Verify folder structure looks correct:

```
public_html/
├── index.html
├── services.html
├── portfolio.html
├── about.html
├── contact.html
├── sitemap.xml
├── robots.txt
├── .htaccess
├── css/
│   └── styles.css
├── js/
│   ├── main.js
│   ├── analytics.js
│   └── form-handler.js
└── images/
    └── (all your images)
```

### Step 4: Set Permissions

1. Right-click on each folder → **Permissions**
2. Set folders to **755**
3. Set files to **644**
4. `.htaccess` should be **644**

### Step 5: Test Your Site

1. Open a new browser tab (incognito mode)
2. Visit `https://yourdomain.com`
3. Test all pages
4. Test contact form
5. Test on mobile device

---

## Option 2: Hostinger Deployment (FTP)

Faster for large file uploads.

### Step 1: Get FTP Credentials

1. In Hostinger hPanel, go to **"Files"** → **"FTP Accounts"**
2. Note your FTP details:
   - **Hostname**: usually `ftp.yourdomain.com`
   - **Username**: usually `yourdomain.com` or similar
   - **Password**: Set a strong FTP password
   - **Port**: 21 (FTP) or 22 (SFTP)

### Step 2: Download FTP Client

**Recommended**: FileZilla (free)
- Download from: https://filezilla-project.org/
- Install on your computer

### Step 3: Connect to Your Server

1. Open FileZilla
2. Enter your FTP credentials:
   - **Host**: ftp.yourdomain.com (or IP address)
   - **Username**: Your FTP username
   - **Password**: Your FTP password
   - **Port**: 21
3. Click **"Quickconnect"**

### Step 4: Upload Files

1. **Left side**: Your local computer files
2. **Right side**: Your server
3. Navigate right side to `public_html` or `www`
4. Select all your local website files
5. Right-click → **"Upload"**
6. Wait for transfer to complete

### Step 5: Verify Upload

1. Right side should show all your files
2. Check that folder structure is correct
3. Visit your website to test

---

## SSL Certificate Setup (HTTPS)

### Hostinger Automatic SSL

1. In hPanel, go to **"SSL"** or **"Security"**
2. Find your domain
3. Click **"Install SSL"** or **"Enable"**
4. Choose **"Free SSL"** (Let's Encrypt)
5. Wait 15-30 minutes for activation

### Force HTTPS in .htaccess

After SSL is active, uncomment these lines in `.htaccess`:

```apache
RewriteCond %{HTTPS} off
RewriteRule ^(.*)$ https://%{HTTP_HOST}/$1 [R=301,L]
```

This forces all HTTP traffic to HTTPS.

Test: Visit `http://yourdomain.com` - should redirect to `https://yourdomain.com`

---

## Domain Configuration

### If Using Custom Domain

1. **Update Domain Name Servers (DNS):**
   - Log in to your domain registrar (Namecheap, GoDaddy, etc.)
   - Point nameservers to Hostinger:
     - ns1.dns-parking.com
     - ns2.dns-parking.com
   - Wait 24-48 hours for DNS propagation

2. **Or Point A Record:**
   - Get your server IP from Hostinger
   - In your domain registrar DNS settings:
     - A Record: `@` → `[Your Server IP]`
     - A Record: `www` → `[Your Server IP]`
   - Wait 1-24 hours

### WWW vs Non-WWW

Choose one version (consistency is important for SEO):

**Option A: Force WWW version**
```apache
RewriteCond %{HTTP_HOST} !^www\. [NC]
RewriteRule ^(.*)$ https://www.%{HTTP_HOST}/$1 [R=301,L]
```

**Option B: Force Non-WWW version** (Recommended)
```apache
RewriteCond %{HTTP_HOST} ^www\.(.+)$ [NC]
RewriteRule ^(.*)$ https://%1/$1 [R=301,L]
```

Uncomment your choice in `.htaccess`.

---

## Post-Deployment Checklist

### Immediate Tests (Within 1 Hour)

- [ ] Homepage loads correctly
- [ ] All pages accessible (test every link)
- [ ] Contact form submits successfully
- [ ] Google Analytics tracking (check Realtime report)
- [ ] HTTPS is working (green padlock in browser)
- [ ] No mixed content warnings
- [ ] Mobile responsive (test on actual phone)
- [ ] All images load correctly
- [ ] Phone numbers are clickable
- [ ] Email links work

### Technical Verification (Within 24 Hours)

- [ ] Run [Google PageSpeed Insights](https://pagespeed.web.dev/)
  - Mobile score 90+
  - Desktop score 90+
- [ ] Run [Google Mobile-Friendly Test](https://search.google.com/test/mobile-friendly)
  - Pass all checks
- [ ] Verify robots.txt: `https://yourdomain.com/robots.txt`
- [ ] Verify sitemap: `https://yourdomain.com/sitemap.xml`
- [ ] Check schema markup: [Google Rich Results Test](https://search.google.com/test/rich-results)
- [ ] Test in multiple browsers:
  - Chrome
  - Firefox
  - Safari
  - Edge
- [ ] Test on multiple devices:
  - iPhone
  - Android
  - Tablet
  - Desktop

### SEO Setup (Within 1 Week)

- [ ] Submit sitemap to Google Search Console
- [ ] Submit sitemap to Bing Webmaster Tools
- [ ] Set up Google Business Profile
- [ ] Request indexing for homepage
- [ ] Monitor for crawl errors

---

## Troubleshooting Common Issues

### Issue: 500 Internal Server Error

**Cause**: `.htaccess` file has unsupported directives

**Solution:**
1. Rename `.htaccess` to `.htaccess.bak`
2. Reload site - should work now
3. Comment out sections of `.htaccess` one by one to find the problem
4. Common culprits:
   - mod_deflate not enabled
   - mod_expires not enabled
   - RewriteEngine not enabled

### Issue: Images Not Loading

**Causes:**
- Wrong file path (case-sensitive on Linux servers!)
- Images not uploaded
- Incorrect permissions

**Solution:**
1. Check image path in HTML: `/images/filename.jpg`
2. Check image exists on server in `images/` folder
3. File names are CASE SENSITIVE: `Image.jpg` ≠ `image.jpg`
4. Set permissions: 644 for images

### Issue: CSS/JavaScript Not Loading

**Solution:**
1. Check browser console (F12) for errors
2. Verify file paths: `/css/styles.css` not `css/styles.css`
3. Clear browser cache: Ctrl+F5 or Cmd+Shift+R
4. Check file permissions: 644

### Issue: Contact Form Not Working

**Solutions:**
1. **Verify Formspree setup:**
   - Did you replace `YOUR_FORM_ID` in contact.html?
   - Is your Formspree account verified?
   - Did you confirm your email address?
2. **Check browser console** for JavaScript errors
3. **Test form submission** - check Formspree dashboard for submissions
4. **Check spam folder** for Formspree emails

### Issue: HTTPS Not Working

**Solution:**
1. Wait 30 minutes after SSL installation
2. Check SSL status in Hostinger hPanel
3. If "pending", wait up to 24 hours
4. Verify DNS is pointing correctly
5. Contact Hostinger support if still failing

### Issue: Site Not Loading (DNS Issues)

**Solution:**
1. Check domain nameservers point to Hostinger
2. Wait 24-48 hours for DNS propagation
3. Use [DNS Checker](https://dnschecker.org/) to verify
4. Clear DNS cache: `ipconfig /flushdns` (Windows) or `sudo dscacheutil -flushcache` (Mac)

---

## Performance Optimization

### Enable Gzip Compression

Already configured in `.htaccess`. To verify:
1. Go to [Check GZIP Compression](https://www.giftofspeed.com/gzip-test/)
2. Enter your URL
3. Should show "GZIP is enabled"

### Enable Browser Caching

Already configured in `.htaccess`. To verify:
1. Go to [GTmetrix](https://gtmetrix.com/)
2. Enter your URL
3. Check "Leverage browser caching" - should be passing

### Minify CSS/JavaScript

Already done if you created minified versions. To use:
1. In HTML, change:
   - `/css/styles.css` → `/css/styles.min.css`
   - `/js/main.js` → `/js/main.min.js`
2. Upload minified files

### Optimize Images

Before uploading images:
1. Resize to appropriate dimensions
2. Compress with [TinyPNG](https://tinypng.com/)
3. Convert to WebP format (optional, modern browsers)
4. Use descriptive file names

---

## Backup Strategy

### Manual Backup (Weekly)

1. **Via FTP:**
   - Connect with FileZilla
   - Download entire `public_html` folder
   - Save as `backup-YYYY-MM-DD.zip`

2. **Via Hostinger:**
   - hPanel → **"Files"** → **"Backups"**
   - Create full backup
   - Download and save locally

### Automatic Backups

**Hostinger Premium Plans:**
- Automatic daily backups included
- Access via hPanel → Backups
- Can restore with one click

**Free Backup Tools:**
- UpdraftPlus (for more complex sites)
- Hostinger's built-in backup (check if available)

---

## Updating Your Site

### To Update a Page:

**Method 1: File Manager (Quick Edits)**
1. Log in to Hostinger hPanel
2. File Manager → Navigate to file
3. Right-click → **"Edit"**
4. Make changes → **"Save"**
5. Test immediately

**Method 2: FTP (Multiple Files)**
1. Edit files locally
2. Connect via FileZilla
3. Upload changed files (overwrites old versions)
4. Test your site

**Best Practice:**
- Always test changes locally first
- Keep local backup before uploading
- Test immediately after upload

---

## Security Best Practices

### Protect Sensitive Files

Already done in `.htaccess`:
- Blocks access to `.htaccess`
- Blocks hidden files
- Blocks backup files

### Keep Software Updated

- Check Hostinger for system updates monthly
- Update any scripts/dependencies if added later

### Monitor for Issues

- Enable "uptime monitoring" if available in Hostinger
- Use [UptimeRobot](https://uptimerobot.com/) (free) to monitor 24/7
- Get alerts if site goes down

### Strong Passwords

- FTP password: 16+ characters, random
- Hostinger panel: Strong unique password
- Enable 2FA on Hostinger account

---

## Getting Help

### Hostinger Support

- **Live Chat**: Available 24/7 in hPanel
- **Email**: support@hostinger.com
- **Knowledge Base**: https://support.hostinger.com/
- Response time: Usually within minutes

### Community Resources

- Hostinger Community Forum
- Stack Overflow (for technical issues)
- WebmasterWorld

---

## Next Steps After Deployment

1. ✓ Site is live and working
2. → Complete `SEO-CHECKLIST.md` post-launch tasks
3. → Set up Google Search Console
4. → Set up Google Business Profile
5. → Request first client reviews
6. → Start monthly monitoring routine

---

## Deployment Checklist Summary

**Before Upload:**
- [ ] Replace placeholder IDs (Analytics, Formspree)
- [ ] Update all domain references
- [ ] Test locally

**Upload:**
- [ ] Transfer all files via FTP or File Manager
- [ ] Verify folder structure
- [ ] Set correct permissions

**SSL:**
- [ ] Install SSL certificate
- [ ] Enable HTTPS redirect
- [ ] Test secure connection

**Testing:**
- [ ] All pages load
- [ ] Forms work
- [ ] Analytics tracking
- [ ] Mobile responsive
- [ ] PageSpeed score 90+

**SEO:**
- [ ] Submit sitemap
- [ ] Verify schema markup
- [ ] Set up Google Business Profile

**Monitoring:**
- [ ] Set up uptime monitoring
- [ ] Schedule weekly backups
- [ ] Calendar monthly maintenance

---

**Your site is ready to help Frederick businesses grow online!**

**Last Updated**: January 2025
