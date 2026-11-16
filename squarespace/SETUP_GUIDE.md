# Squarespace setup guide — Pendo International Projects

For **Squarespace 7.1** (Fluid Engine). Adjust menu names if your template differs.

---

## 1. Custom CSS (5 minutes)

1. Log into Squarespace → **Design** → **Custom CSS**
2. Paste the full contents of **`custom-css.css`**
3. **Save**

Optional: **Settings → Advanced → Code Injection → Header** — only if you use the optional snippet in `code-injection-header.html` (fonts). If the template already loads similar fonts, skip it.

---

## 2. Navigation

**Main menu (top):**

| Label | Page |
|-------|------|
| Our School | `/our-school` |
| Staff | `/staff` |
| Admissions | `/admissions` |
| Pendo Sisters | `/pendo-sisters` |
| About | `/about` |
| Impact | `/impact` |
| Stories | `/stories` (blog) |
| Donate | `/donate` or external Canada Helps link |

**Header button (primary CTA):** `Donate` or `Sponsor a Seat`

**Secondary CTA in nav (if template allows):** `Admissions`

---

## 3. Create pages

For each page: **Pages → + → Blank** (or duplicate an existing page), set URL slug, then add sections per **`homepage-layout.md`** (home only) or **`PASTE_COPY.md`** (other pages).

| Page name | URL slug | Notes |
|-----------|----------|--------|
| Home | `/` | See homepage-layout.md |
| Our School | `/our-school` | Summary blocks for pillars |
| Staff | `/staff` | Team block or gallery + text |
| Admissions | `/admissions` | FAQ accordion + form |
| Pendo Sisters | `/pendo-sisters` | Separate from Admissions |
| About | `/about` | Story + mission |
| Impact | `/impact` | Timeline or text sections |
| Donate | `/donate` | Buttons to giving links |
| Contact | `/contact` | Form + emails |
| Stories | `/stories` | **Blog** collection |

**Announcement bar (optional):** Settings → **Announcement bar** — e.g. *2026: Child & Family Development Hub*

---

## 4. Homepage (Kutoa-inspired)

Build top to bottom — details in **`homepage-layout.md`**.

Quick pattern (same idea as Kutoa):

1. Hero — headline + identity paragraph + **two buttons**
2. Two pathway cards — “For parents” / “Support our work”
3. Numbered summary — 01 / 02 / 03 (school offer, impact, Sisters teaser)
4. Photo band — full-width image
5. Featured blog post or story
6. Testimonials (optional)
7. Impact stats or timeline teaser → link to Impact
8. Final dual CTA

Use **Image** blocks with real school / Instagram-quality photos.

---

## 5. Blog (Stories & Insights)

1. **Pages** → ensure **Blog** exists (rename to “Stories” or “Stories & Insights”)
2. Categories: e.g. *School life*, *Impact*, *Pendo Sisters*
3. Pin one post as “Featured” on homepage (Summary block or Blog block)

---

## 6. Forms

**Admissions / Contact:**

- Use **Form block** on Admissions and Contact
- Fields: Name, Email, Phone, Child’s age, Message
- Storage: Squarespace email notifications + connect to Ciro’s inbox
- If they use **WhatsApp**, add a **Button** block: `Chat on WhatsApp` with link `[whatsapp-link]`

---

## 7. Donate & Sponsor a Seat

Squarespace often links **out** to Canada Helps or similar:

1. **Donate** page: short copy + **Button** blocks (primary + secondary)
2. Set button links to live donation URLs from Ciro
3. Repeat “Sponsor a Seat” on Our School footer section and Impact page

---

## 8. SEO (each page)

**Page settings → SEO** — titles/descriptions are in **`PASTE_COPY.md`** under each page.

---

## 9. Mobile check

Preview phone view for:

- Two homepage CTAs visible without scrolling too far
- Nav opens cleanly (hamburger)
- Text readable on ivory/green sections

---

## 10. What you (developer) deliver on Squarespace

- [ ] Custom CSS applied  
- [ ] Nav + all pages created with paste copy  
- [ ] Homepage section structure (Kutoa-style pathways)  
- [ ] Blog renamed/configured  
- [ ] Forms + donate links wired  
- [ ] Pendo Sisters page live (not buried under About)  
- [ ] Training: 15 min walkthrough for Ciro (edit text, swap image, publish post)

**Hosting:** Already on Squarespace — no separate WordPress unless they migrate later.
