<?php
/**
 * ============================================================================
 * ShopZone — product page with customer reviews
 * ISW613 · Week 4 · Cross-Site Scripting (XSS)
 * ============================================================================
 *
 * This looks like an ordinary e-commerce product page. Nothing here screams
 * "hack me" — which is the point. Two realistic features carry two classic XSS
 * bugs:
 *
 *   • The SEARCH BAR reflects your query back ("results for ...")   -> REFLECTED XSS
 *   • The REVIEW FORM saves your text and shows it to every visitor -> STORED XSS
 *
 * The stored reviews live in reviews.json next to this file, exactly like a
 * real site would keep them in a database. A payload you post once fires in the
 * browser of everyone who later opens the page.
 *
 * HOW TO RUN:
 *   php -S localhost:8000 xss_example.php
 *   open http://localhost:8000/xss_example.php
 *
 * TRY IT:
 *   Reflected — search for:   <script>alert('reflected')</script>
 *   Stored    — post a review whose text is:
 *               <img src=x onerror="alert('stored: '+document.cookie)">
 *               Reload the page (or open it as another user) and it fires again.
 *
 * THE FIX is the commented line directly beneath each vulnerable echo. Swap the
 * vulnerable line for the secure one, retry the payloads, and the markup shows
 * up as harmless text instead of executing.
 * ============================================================================
 */

const REVIEWS_FILE = __DIR__ . '/reviews.json';

/** Load stored reviews (newest first). */
function load_reviews(): array {
    if (!is_file(REVIEWS_FILE)) {
        return [];
    }
    $data = json_decode((string) file_get_contents(REVIEWS_FILE), true);
    return is_array($data) ? $data : [];
}

/** Append one review to the JSON "database". */
function save_review(array $review): void {
    $reviews = load_reviews();
    array_unshift($reviews, $review);
    file_put_contents(REVIEWS_FILE, json_encode($reviews, JSON_PRETTY_PRINT));
}

// Seed a couple of believable reviews on first run.
if (!is_file(REVIEWS_FILE)) {
    save_review(['name' => 'Marta R.',  'rating' => 4, 'body' => 'Great battery life, comfy on long calls.', 'date' => '2026-09-28']);
    save_review(['name' => 'Dev C.',    'rating' => 5, 'body' => 'Best headphones I have owned. Bass is clean.', 'date' => '2026-10-02']);
}

// Handle a newly submitted review (stored input — persisted as-is, like a DB row).
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['review'])) {
    save_review([
        'name'   => trim($_POST['name'] ?? 'Anonymous') ?: 'Anonymous',
        'rating' => max(1, min(5, (int) ($_POST['rating'] ?? 5))),
        'body'   => (string) $_POST['review'],
        'date'   => date('Y-m-d'),
    ]);
    // Post/Redirect/Get so a refresh doesn't resubmit.
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

$search  = $_GET['search'] ?? '';
$reviews = load_reviews();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Aurora Wireless Headphones — ShopZone</title>
  <style>
    :root { --ink:#1f2933; --muted:#6b7280; --line:#e5e7eb; --brand:#4f46e5; --star:#f59e0b; }
    * { box-sizing: border-box; }
    body { font-family: system-ui, -apple-system, sans-serif; color: var(--ink); margin: 0; background: #f9fafb; }
    header { background: #fff; border-bottom: 1px solid var(--line); padding: .8rem 1.2rem; display: flex; align-items: center; gap: 1rem; }
    .logo { font-weight: 800; color: var(--brand); font-size: 1.25rem; letter-spacing: -.5px; }
    .search { margin-left: auto; display: flex; gap: .4rem; flex: 1; max-width: 420px; }
    .search input { flex: 1; padding: .5rem .7rem; border: 1px solid var(--line); border-radius: 8px; font-size: .95rem; }
    .search button, .btn { background: var(--brand); color: #fff; border: 0; border-radius: 8px; padding: .5rem .9rem; font-size: .95rem; cursor: pointer; }
    main { max-width: 860px; margin: 1.5rem auto; padding: 0 1rem; }
    .notice { background: #eef2ff; border: 1px solid #c7d2fe; border-radius: 8px; padding: .6rem .9rem; margin-bottom: 1.2rem; font-size: .95rem; }
    .product { display: flex; gap: 1.5rem; background: #fff; border: 1px solid var(--line); border-radius: 12px; padding: 1.2rem; }
    .thumb { width: 180px; height: 180px; border-radius: 10px; background: linear-gradient(135deg,#6366f1,#a855f7); flex: none; display:flex; align-items:center; justify-content:center; color:#fff; font-size:3rem; }
    .price { font-size: 1.6rem; font-weight: 700; margin: .3rem 0; }
    .stars { color: var(--star); letter-spacing: 2px; }
    h1 { font-size: 1.4rem; margin: .2rem 0; }
    h2 { font-size: 1.15rem; border-bottom: 1px solid var(--line); padding-bottom: .4rem; margin-top: 2rem; }
    .review { background: #fff; border: 1px solid var(--line); border-radius: 10px; padding: .9rem 1.1rem; margin: .7rem 0; }
    .review .meta { color: var(--muted); font-size: .85rem; display: flex; gap: .6rem; align-items: center; margin-bottom: .3rem; }
    .review .name { font-weight: 600; color: var(--ink); }
    form.add { background:#fff; border:1px solid var(--line); border-radius:10px; padding:1rem; margin-top:1rem; }
    form.add label { display:block; font-size:.85rem; color:var(--muted); margin:.5rem 0 .2rem; }
    form.add input[type=text], form.add textarea, form.add select { width:100%; padding:.5rem .7rem; border:1px solid var(--line); border-radius:8px; font-family:inherit; font-size:.95rem; }
    form.add textarea { min-height: 80px; resize: vertical; }
    .muted { color: var(--muted); font-size: .9rem; }
  </style>
</head>
<body>
  <header>
    <span class="logo">◆ ShopZone</span>
    <form class="search" method="GET" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES, 'UTF-8'); ?>">
      <input type="text" name="search" placeholder="Search products…" value="">
      <button type="submit">Search</button>
    </form>
  </header>

  <main>
    <?php if ($search !== ''): ?>
      <div class="notice">
        Showing results for
        &ldquo;<?php

          // ============================================================
          // REFLECTED XSS — the query is echoed straight back into the page.
          //   Payload:  <script>alert('reflected')</script>
          //echo $search;

          // SECURE — escape for the HTML body so markup renders as text:
           echo htmlspecialchars($search, ENT_QUOTES, 'UTF-8');
          // ============================================================

        ?>&rdquo; — no matching products. Showing featured item instead.
      </div>
    <?php endif; ?>

    <section class="product">
      <div class="thumb">🎧</div>
      <div>
        <h1>Aurora Wireless Headphones</h1>
        <div class="stars">★★★★☆ <span class="muted">(<?php echo count($reviews); ?> reviews)</span></div>
        <div class="price">$129.00</div>
        <p class="muted">Active noise cancelling · 40h battery · USB-C fast charge.</p>
        <button class="btn">Add to cart</button>
      </div>
    </section>

    <h2>Customer reviews</h2>

    <?php foreach ($reviews as $r): ?>
      <article class="review">
        <div class="meta">
          <span class="name"><?php

            // ============================================================
            // STORED XSS (#1) — reviewer name rendered without encoding.
            //   A name like  <svg onload=alert(1)>  runs for every visitor.
            echo $r['name'];

            // SECURE:
            // echo htmlspecialchars($r['name'], ENT_QUOTES, 'UTF-8');
            // ============================================================

          ?></span>
          <span class="stars"><?php echo str_repeat('★', (int) $r['rating']) . str_repeat('☆', 5 - (int) $r['rating']); ?></span>
          <span><?php echo htmlspecialchars($r['date'], ENT_QUOTES, 'UTF-8'); ?></span>
        </div>
        <div class="body"><?php

          // ============================================================
          // STORED XSS (#2) — the review body is the big one. It was saved
          // to reviews.json earlier and is now replayed into every visitor's
          // browser — a persistent payload, no link to click.
          //   Payload:  <img src=x onerror="alert('stored: '+document.cookie)">
          echo $r['body'];

          // SECURE — for plain-text reviews, encode on output:
          // echo htmlspecialchars($r['body'], ENT_QUOTES, 'UTF-8');
          //
          // If reviews truly need formatting (bold, links), DON'T hand-roll it:
          // run an allowlist sanitizer such as HTML Purifier instead.
          // ============================================================

        ?></div>
      </article>
    <?php endforeach; ?>

    <form class="add" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES, 'UTF-8'); ?>">
      <strong>Write a review</strong>
      <label for="name">Your name</label>
      <input type="text" id="name" name="name" placeholder="Jane D.">
      <label for="rating">Rating</label>
      <select id="rating" name="rating">
        <option value="5">★★★★★</option>
        <option value="4">★★★★</option>
        <option value="3">★★★</option>
        <option value="2">★★</option>
        <option value="1">★</option>
      </select>
      <label for="review">Review</label>
      <textarea id="review" name="review" placeholder="What did you think?"></textarea>
      <p><button class="btn" type="submit">Post review</button></p>
    </form>

    <p class="muted">
      Instructor note: delete <code>reviews.json</code> to reset the demo to its
      seeded state. See the commented <code>SECURE</code> line under each
      <code>echo</code> for the per-context fix, and add a
      <code>Content-Security-Policy</code> header plus <code>HttpOnly</code>
      cookies as defense in depth.
    </p>
  </main>
</body>
</html>
