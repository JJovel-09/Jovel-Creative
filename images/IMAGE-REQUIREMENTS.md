# Image Requirements for Jovel Creative Website

This file lists all images needed for the website with specifications and recommendations.

## Required Images

### 1. Logo (`logo.svg` or `logo.png`)

**Purpose**: Brand identity in header and footer
**Dimensions**: 150x50px (approximate, maintain aspect ratio)
**Format**: SVG preferred (scalable), PNG fallback
**Background**: Transparent
**Colors**: Use brand colors (Navy #1a365d or Orange #f97316)

**Where to create**:
- [Canva](https://canva.com) - Free logo maker
- [Looka](https://looka.com) - AI logo generator
- [LogoMakr](https://logomakr.com) - Free logo designer

**Temporary text logo**: Your current site uses text "Jovel Creative" - works fine!

---

### 2. Juan Jovel Photo (`juan-jovel.jpg`)

**Purpose**: About page - builds trust and personal connection
**Dimensions**: 800x1000px (portrait orientation)
**Format**: JPG
**Style**: Professional headshot or casual professional photo
**Background**: Clean, uncluttered, or blurred
**Compress**: Use [TinyPNG](https://tinypng.com/) before uploading

**Recommendations**:
- Professional attire or business casual
- Good lighting, natural smile
- High resolution (can be resized down)
- Face should be clearly visible

**Placeholder**: If you don't have a professional photo, consider:
- Professional photographer in Frederick area
- Use iPhone portrait mode with good lighting
- Temporary: Use subtle background with text "Juan Jovel, Web Developer"

---

### 3. Portfolio Images

#### `portfolio-1.jpg` - Creative Professional Portfolio

**Purpose**: Showcase first portfolio project
**Dimensions**: 1200x800px (3:2 ratio)
**Format**: JPG
**Content**: Screenshot of a portfolio website you've built

**How to create**:
1. Take full-page screenshot of actual project website
2. Or create mockup using [Mockuphone](https://mockuphone.com/)
3. Resize to 1200x800px
4. Compress with TinyPNG
5. Name descriptively: `portfolio-creative-professional.jpg`

**ALT Text**: "Modern portfolio website design for Frederick creative professional showcasing work and services"

#### `portfolio-2.jpg` - App Support Website

**Purpose**: Showcase second portfolio project
**Specs**: Same as portfolio-1
**Content**: Screenshot of support/documentation site
**ALT Text**: "Software product support website with comprehensive documentation and FAQ section"

#### `portfolio-3.jpg` - Local Service Business

**Purpose**: Showcase third portfolio project
**Specs**: Same as portfolio-1
**Content**: Screenshot of local business website
**ALT Text**: "Local service business website design for Frederick Maryland company with Google Maps integration"

**Note**: If you don't have 3 completed projects yet:
- Use mockups from design templates
- Create fictional project examples
- Show your own website as an example
- Use high-quality stock website screenshots (credit source)
- Replace with real projects as you complete them

---

### 4. Open Graph / Social Media Image (`og-image.jpg`)

**Purpose**: Shows when site is shared on Facebook, LinkedIn, Twitter
**Dimensions**: 1200x630px (1.91:1 ratio)
**Format**: JPG
**Content**: Brand name + tagline + visual element

**Example content**:
```
Jovel Creative
Custom Websites for Frederick Businesses
No WordPress. Just Fast, Clean Code.
[Background with geometric shapes or website mockup]
```

**Tools to create**:
- [Canva](https://canva.com) - Social media templates
- [Pablo by Buffer](https://pablo.buffer.com/) - Quick social images
- [Remove.bg](https://www.remove.bg/) - Remove backgrounds

**Quick version**: Take screenshot of your homepage hero section (1200x630px crop)

---

### 5. Twitter Card Image (`twitter-card.jpg`)

**Purpose**: Shows when site is shared on Twitter/X
**Specs**: Can use same as `og-image.jpg`
**Alternatively**: 1200x675px (16:9 ratio)

**Note**: Most sites use the same image for both OG and Twitter cards.

---

### 6. Favicon (`favicon.ico`)

**Purpose**: Small icon in browser tab
**Dimensions**: 32x32px (automatically scales to 16x16px)
**Format**: ICO or PNG
**Content**: Simplified version of logo or initials "JC"

**How to create**:
1. Create 512x512px version of logo
2. Use [Favicon Generator](https://favicon.io/) to convert
3. Upload the generated `favicon.ico` file

**Quick version**: Use just the letter "J" in brand colors on transparent background

---

## Optional But Recommended Images

### 7. Hero Background (`hero-background.jpg`)

**Purpose**: Background for homepage hero section
**Dimensions**: 1920x1080px (Full HD)
**Format**: JPG
**Style**: Subtle, not distracting from text
**Content Ideas**:
- Blurred office workspace
- Abstract geometric shapes
- Subtle gradient
- Code editor screenshot (very blurred)
- Frederick skyline (subtle background)

**Current site**: Uses CSS gradient background - works well! Add image if desired.

---

### 8. Testimonial Avatars (Optional)

**If you have real testimonials:**
- Request client photo (optional)
- 200x200px circle crop
- Or use placeholder avatar

**Current site**: Uses placeholder boxes - replace when you have real testimonials and photos.

---

## Image Optimization Checklist

Before uploading ANY image:

- [ ] Resize to appropriate dimensions
- [ ] Compress with [TinyPNG](https://tinypng.com/) or [Squoosh](https://squoosh.app/)
- [ ] Aim for under 200KB per image
- [ ] Use descriptive file names: `frederick-web-developer.jpg` NOT `IMG_1234.jpg`
- [ ] Add to appropriate `/images` folder
- [ ] Update HTML with proper ALT text

---

## Where to Find Stock Images (If Needed)

**Free High-Quality Stock Photos:**
- [Unsplash](https://unsplash.com/) - Free, no attribution required
- [Pexels](https://www.pexels.com/) - Free, no attribution required
- [Pixabay](https://pixabay.com/) - Free, no attribution required

**Search Terms for Relevant Images:**
- "web developer workspace"
- "website design mockup"
- "business meeting Maryland"
- "Frederick Maryland downtown" (for local flavor)
- "laptop office workspace"
- "code programming"

**Mockup Generators:**
- [Mockuphone](https://mockuphone.com/) - Device mockups
- [Smartmockups](https://smartmockups.com/) - Free tier available
- [Placeit](https://placeit.net/) - Mockup templates

---

## Image File Structure

Your `/images` folder should contain:

```
images/
├── IMAGE-REQUIREMENTS.md (this file)
├── logo.svg
├── juan-jovel.jpg
├── portfolio-1.jpg
├── portfolio-2.jpg
├── portfolio-3.jpg
├── og-image.jpg
├── twitter-card.jpg
└── favicon.ico
```

---

## Priority Order

**Must Have (Before Launch):**
1. Favicon (simple "J" icon is fine)
2. Juan Jovel photo (professional headshot)
3. Portfolio images (at least 1-2 real or mockups)

**Should Have (First Month):**
4. Logo (can use text temporarily)
5. OG/Twitter images (can use homepage screenshot)

**Nice to Have (When Available):**
6. Hero background image
7. Testimonial photos
8. Additional portfolio screenshots

---

## Current Placeholder Status

Your HTML currently references these images. They will show broken image icons until you upload actual images:

- `/images/logo.svg` - Use text "Jovel Creative" temporarily (already in CSS)
- `/images/juan-jovel.jpg` - Needed for about page
- `/images/portfolio-1.jpg` - Needed for portfolio page
- `/images/portfolio-2.jpg` - Needed for portfolio page
- `/images/portfolio-3.jpg` - Needed for portfolio page
- `/images/og-image.jpg` - For social sharing (optional)
- `/images/twitter-card.jpg` - For Twitter sharing (optional)
- `/favicon.ico` - Small browser tab icon

**Site will still work without images**, but they greatly improve trust and conversion rates!

---

## Quick Start: Minimum Viable Images

If you need to launch quickly, here's the bare minimum:

### 1. Create Simple Favicon (5 minutes)
- Use [Favicon Generator](https://favicon.io/favicon-generator/)
- Enter "JC" or "J"
- Choose brand colors
- Download and upload `favicon.ico`

### 2. Professional Headshot (30 minutes)
- Use phone with good lighting
- Clean background
- Business casual attire
- Save as `juan-jovel.jpg`
- Compress with TinyPNG
- Upload

### 3. Portfolio Placeholders (15 minutes)
- Take 3 screenshots of well-designed websites you admire
- Or create 3 simple mockups in Canva
- Resize to 1200x800px
- Name: `portfolio-1.jpg`, `portfolio-2.jpg`, `portfolio-3.jpg`
- Compress and upload

**Total time**: ~1 hour to have a fully functional, professional-looking site!

---

## Need Help?

**Image Editing:**
- [Photopea](https://www.photopea.com/) - Free Photoshop alternative (browser-based)
- [GIMP](https://www.gimp.org/) - Free desktop image editor
- [Canva](https://www.canva.com/) - Easy drag-and-drop design tool

**Compression:**
- [TinyPNG](https://tinypng.com/) - Best for JPG and PNG
- [Squoosh](https://squoosh.app/) - Google's image optimizer
- [ImageOptim](https://imageoptim.com/) - Mac app

**Mockups:**
- [Mockuphone](https://mockuphone.com/) - Device frames
- [Smartmockups](https://smartmockups.com/) - Professional mockups

---

**Questions?** Contact juan@jovelcreative.com

**Last Updated**: January 2025
