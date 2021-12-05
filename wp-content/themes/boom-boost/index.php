<?php get_header(); ?>
<div class="page-main">
  <div class="top top--main">
    <div class="container">
      <div class="top__content">
        <div class="trust-support"> <a class="header__trust" href="/">
            <div class="header__trust-stars">TrustPilot
              <div class="header__trust-stars-logo icons-main icons-main__trustpilot-2"></div>
            </div>
            <div class="header__trust-counter">TrustScore <span> 9.8 </span>Reviews <span> 484 </span></div>
          </a></div>
        <h1>Secure and efficient WoW Boosting and Coaching Services</h1>
        <div class="description">Buy WoW Boosts and carries from the most customer oriented website</div>
        <a class="link link-bg " href="#">explore the catalog</a>
        <div class="event">
          <div class="event__name">
            <div class="event__name-logo icons-main icons-main__horde"></div>Sanctum of Domination </br> Heroic
            Raid Run
          </div>
          <div class="event__timer"> <span class="hours">3h </span>: <span class="minutes">42m </span>: <span
              class="seconds">12s</span></div>
          <a class="link link-bg--transparent " href="#">check other raids</a>
        </div>
      </div>
    </div>
  </div>
  <section class="container content-block__hot-sellers">
    <div class="content-block__header">
      <h2 class="content-block__title">hot offers and best sellers 44</h2>
      <a class="link link-bg--transparent all-content" href="#">check all offers</a>
    </div>

    <?php
$loop = new WP_Query( array(
'post_type' => 'product',
'posts_per_page' => 4,
'orderby' => 'menu_order',
'order' => 'ASC',
));

while ( $loop->have_posts() ): $loop->the_post(); ?>
    <div <?php post_class("inloop-product"); ?>>
      <div class="row">
        <div class="col-sm-4">
          <?php the_post_thumbnail("thumbnail-215x300"); ?>
        </div>
        <div class="col-sm-8">
          <h4>
            <a href="<?php the_permalink(); ?>">
              <?php the_title(); ?>
            </a>
          </h4>
          <?php the_content(); ?>
          <p class="price">
            <?php _e("Price:","examp"); ?>
            <?php woocommerce_template_loop_price(); ?>
          </p>
          <?php woocommerce_template_loop_add_to_cart(); ?>
        </div>
      </div>
    </div>
    <?php endwhile; wp_reset_postdata(); ?>
    <div class="content-block__body cards-wrapper">
      <a class="card-product" href="#"><img class="card-product__image" src="static/img/cards/Frame_1.jpg" alt="">
        <div class="card-product__title">[EU/US] 1800 rating with Rival Title</div>
        <div class="card-product__subTitle"></div>
        <div class="card-product__price-block"> <span class="price-1">$88.99</span><span
            class="price-old">$118.00</span></div>
        <div class="card-product__more link link-bg--transparent">more </div>
      </a>
      <a class="card-product" href="#"><img class="card-product__image" src="static/img/cards/Frame_2.jpg" alt="">
        <div class="card-product__title">Play With PRO 3v3</div>
        <div class="card-product__subTitle"></div>
        <div class="card-product__price-block"><span class="price-1">$34.99</span> - <span
            class="price-2">$356.00</span></div>
        <div class="card-product__more link link-bg--transparent">more</div>
      </a>
      <a class="card-product" href="#"><img class="card-product__image" src="static/img/cards/Frame_3.jpg" alt="">
        <div class="card-product__title">[EU/US] 2100 rating with</div>
        <div class="card-product__subTitle">Duelist Title</div>
        <div class="card-product__price-block"><span class="price-1">$245.00</span> - <span
            class="price-2">$299.00</span></div>
        <div class="card-product__more link link-bg--transparent">more</div>
      </a>
      <a class="card-product" href="#"><img class="card-product__image" src="static/img/cards/Frame_4.jpg" alt="">
        <div class="card-product__title">Buy Arena 2v2 Rating</div>
        <div class="card-product__subTitle">Boost</div>
        <div class="card-product__price-block"><span class="price-1">$74.00</span> - <span
            class="price-2">$169.00</span></div>
        <div class="card-product__more link link-bg--transparent">more</div>
      </a>
      <a class="link link-bg--transparent all-content" href="#">check all offers</a>
    </div>
  </section>
  <section class="container content-block__upcoming-raids">
    <div class="content-block__header">
      <h2 class="content-block__title">Upcoming Raids</h2>
      <a class="link link-bg--transparent all-content" href="#">check raids calendar</a>
    </div>
    <div class="content-block__body">
      <div class="tabs-block">
        <ul class="tabs-block__nav">
          <li>
            <a class="active-tab" href="#">All</a></li>
          <li>
            <a href="#">Heroic</a></li>
          <li>
            <a href="#">Mythic</a></li>
          <li>
            <a href="#">Glories</a></li>
          <li>
            <a href="#">Mounts</a></li>
        </ul>
        <ul class="tabs-block__nav">
          <li>
            <a class="active-tab" href="#">All</a></li>
          <li>
            <a href="#">Horde</a></li>
          <li>
            <a href="#">Alliance</a></li>
        </ul>
        <div class="tabs-block__content cards-wrapper">
          <div class="card-raid card-raid--active">
            <div class="card-raid__head"> <span class="card-raid__head-desc">Next raid in </span><span
                class="card-raid__head-date">at 10:00 a.m.</span><span class="card-raid__head-time">3 h : 42 m :
                10 sec</span></div>
            <div class="card-raid__body">
              <div class="card-raid__body-title">Sanctum of Domination </br> Heroic Boost run</div>
              <div class="card-raid__body-desc--wrapp">
                <ul class="card-raid__body-desc">
                  <li>10/10 bosses killed on Heroic difficulty</li>
                  <li>All achievements for killing 10/10 bosses on Heroic difficulty</li>
                  <li>Chance to obtain high ilvl gear</li>
                  <li>ETA run 3-5 hours</li>
                </ul>
                <div class="card-raid__body-logo icons-main icons-main__alliance"> </div>
              </div>
              <div class="card-raid__body-price">€299.99</div>
            </div>
            <a class="link link-bg card-raid__link">add to basket</a>
          </div>
          <div class="card-raid">
            <div class="card-raid__head"> <span class="card-raid__head-date">9 September</span><span
                class="card-raid__head-time">10:00 a.m.</span></div>
            <div class="card-raid__body">
              <div class="card-raid__body-title">Sylvanas Windrunner Last Boss Defeat</div>
              <div class="card-raid__body-desc--wrapp">
                <ul class="card-raid__body-desc">
                  <li>Selfplayed run</li>
                  <li>Run takes 20-30 mins</li>
                  <li>Heroic: chance to get ilvl 246+ gear</li>
                  <li>Chance to get Rae'shalare</li>
                  <li>Death's Whisper if you are a hunter</li>
                </ul>
                <div class="card-raid__body-logo icons-main icons-main__horde"> </div>
              </div>
              <div class="card-raid__body-price">€11.99</div>
            </div>
            <a class="link link-bg card-raid__link">add to basket</a>
          </div>
          <div class="card-raid">
            <div class="card-raid__head"> <span class="card-raid__head-date">9 September</span><span
                class="card-raid__head-time">10:00 a.m.</span></div>
            <div class="card-raid__body">
              <div class="card-raid__body-title">Sylvanas Windrunner Last Boss Defeat</div>
              <div class="card-raid__body-desc--wrapp">
                <ul class="card-raid__body-desc">
                  <li>Selfplayed run</li>
                  <li>Run takes 20-30 mins</li>
                  <li>Heroic: chance to get ilvl 246+ gear</li>
                  <li>Chance to get Rae'shalare</li>
                  <li>Death's Whisper if you are a hunter</li>
                </ul>
                <div class="card-raid__body-logo icons-main icons-main__alliance"> </div>
              </div>
              <div class="card-raid__body-price">€11.99</div>
            </div>
            <a class="link link-bg card-raid__link">add to basket</a>
          </div>
          <div class="card-raid">
            <div class="card-raid__head"> <span class="card-raid__head-date">9 September</span><span
                class="card-raid__head-time">10:00 a.m.</span></div>
            <div class="card-raid__body">
              <div class="card-raid__body-title">Sylvanas Windrunner Last Boss Defeat</div>
              <div class="card-raid__body-desc--wrapp">
                <ul class="card-raid__body-desc">
                  <li>Selfplayed run</li>
                  <li>Run takes 20-30 mins</li>
                  <li>Heroic: chance to get ilvl 246+ gear</li>
                  <li>Chance to get Rae'shalare</li>
                  <li>Death's Whisper if you are a hunter</li>
                </ul>
                <div class="card-raid__body-logo icons-main icons-main__horde"> </div>
              </div>
              <div class="card-raid__body-price">€11.99</div>
            </div>
            <a class="link link-bg card-raid__link">add to basket</a>
          </div>
        </div>
      </div>
      <a class="link link-bg--transparent all-content" href="#">check raids calendar</a>
    </div>
  </section>
  <section class="container content-block__advantages">
    <div class="content-block__header">
      <h2 class="content-block__title">why choose us?</h2>
    </div>
    <div class="content-block__body cards-wrapper">
      <div class="card-advantages">
        <div class="card-advantages__icon icons-game icons-game__support"></div>
        <div class="card-advantages__content">
          <div class="card-advantages__content-title">support</div>
          <div class="card-advantages__content-desc">Provide 24/7 support and solve any issues that may come up
            fast and professionaly.</div>
        </div>
      </div>
      <div class="card-advantages">
        <div class="card-advantages__icon icons-game icons-game__reviews"></div>
        <div class="card-advantages__content">
          <div class="card-advantages__content-title">reviews</div>
          <div class="card-advantages__content-desc">A large number of reviews on an independent site Trustpilot.
          </div>
        </div>
      </div>
      <div class="card-advantages">
        <div class="card-advantages__icon icons-game icons-game__vpn"></div>
        <div class="card-advantages__content">
          <div class="card-advantages__content-title">vpn</div>
          <div class="card-advantages__content-desc">We use VPN to to keep your account safe.</div>
        </div>
      </div>
      <div class="card-advantages">
        <div class="card-advantages__icon icons-game icons-game__safe-data"></div>
        <div class="card-advantages__content">
          <div class="card-advantages__content-title">safe data</div>
          <div class="card-advantages__content-desc">Your data is protected by SSL certificate.</div>
        </div>
      </div>
      <div class="card-advantages">
        <div class="card-advantages__icon icons-game icons-game__money-back"></div>
        <div class="card-advantages__content">
          <div class="card-advantages__content-title">money back guarantee</div>
          <div class="card-advantages__content-desc">Process full and immediate refund in case of default.</div>
        </div>
      </div>
      <div class="card-advantages">
        <div class="card-advantages__icon icons-game icons-game__profi"></div>
        <div class="card-advantages__content">
          <div class="card-advantages__content-title">profi</div>
          <div class="card-advantages__content-desc">A truly professional booster team, including R1 players.
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="container content-block__popular">
    <div class="content-block__header">
      <h2 class="content-block__title">popular services</h2>
      <a class="link link-bg--transparent all-content" href="#">check all categories</a>
    </div>
    <div class="content-block__body cards-wrapper">
      <div class="card-popular">
        <div class="card-popular__title">Leveling</div>
        <div class="card-popular__logo icons-game icons-game__Leveling"></div>
      </div>
      <div class="card-popular">
        <div class="card-popular__title">WoW Classic</div>
        <div class="card-popular__logo icons-game icons-game__WoWClassic"></div>
      </div>
      <div class="card-popular">
        <div class="card-popular__title">Mythic+</div>
        <div class="card-popular__logo icons-game icons-game__Mythic"></div>
      </div>
      <div class="card-popular">
        <div class="card-popular__title">PVP Arena Rating</div>
        <div class="card-popular__logo icons-game icons-game__PVPArenaRating"></div>
      </div>
      <div class="card-popular">
        <div class="card-popular__title">Gladiator Arena</div>
        <div class="card-popular__logo icons-game icons-game__GladiatorArena"></div>
      </div>
      <a class="link link-bg--transparent all-content" href="#">check all categories</a>
    </div>
  </section>
  <section class="container content-block__trustpilot">
    <div class="content-block__header">
      <h2 class="content-block__title">trustpilot</h2>
      <div class="truspilot-rating">
        <div class="truspilot-rating__logo icons-main icons-main__trustpilot-2"></div>
        <div class="truspilot-rating__values">
          <div class="truspilot-rating__values-ratio"> <span class="ratio-big">5</span><span> / 5</span> based on
            264 reviews</div>
        </div>
      </div>
    </div>
    <div class="content-block__body cards-wrapper">
      <div class="slider">
        <div class="slider__wrapper">
          <div class="slider__items">
            <div class="card-trustpilot slider__item">
              <div class="card-trustpilot__header">
                <div class="card-trustpilot__header-icon"><img src="static/img/cards/Frame.jpg" alt=""></div>
                <div class="card-trustpilot__header-desc">
                  <div class="card-trustpilot__header-data">2021-07-09</div>
                  <div class="card-trustpilot__header-name">Christian</div>
                </div>
                <div class="card-trustpilot__header-logo icons-main icons-main__trustpilot"></div>
              </div>
              <div class="card-trustpilot__body">Hands down the best service in the market. These guys are good
                and they are quick. Polite and professional, look no further your money is well spent here.Hands
                down the best service in the market. These guys are good and they are quick. Polite and
                professional, look no further your money is well spent here.</div>
            </div>
            <div class="card-trustpilot slider__item">
              <div class="card-trustpilot__header">
                <div class="card-trustpilot__header-icon"><img src="static/img/cards/Frame.jpg" alt=""></div>
                <div class="card-trustpilot__header-desc">
                  <div class="card-trustpilot__header-data">2021-07-09</div>
                  <div class="card-trustpilot__header-name">Christian</div>
                </div>
                <div class="card-trustpilot__header-logo icons-main icons-main__trustpilot"></div>
              </div>
              <div class="card-trustpilot__body">Hands down the best service in the market. These guys are good
                and they are quick. Polite and professional, look no further your money is well spent here.</div>
            </div>
            <div class="card-trustpilot slider__item">
              <div class="card-trustpilot__header">
                <div class="card-trustpilot__header-icon"><img src="static/img/cards/Frame.jpg" alt=""></div>
                <div class="card-trustpilot__header-desc">
                  <div class="card-trustpilot__header-data">2021-07-09</div>
                  <div class="card-trustpilot__header-name">Christian</div>
                </div>
                <div class="card-trustpilot__header-logo icons-main icons-main__trustpilot"></div>
              </div>
              <div class="card-trustpilot__body">Hands down the best service in the market. These guys are good
                and they are quick. Polite and professional, look no further your money is well spent here.</div>
            </div>
            <div class="card-trustpilot slider__item">
              <div class="card-trustpilot__header">
                <div class="card-trustpilot__header-icon"><img src="static/img/cards/Frame.jpg" alt=""></div>
                <div class="card-trustpilot__header-desc">
                  <div class="card-trustpilot__header-data">2021-07-09</div>
                  <div class="card-trustpilot__header-name">Christian</div>
                </div>
                <div class="card-trustpilot__header-logo icons-main icons-main__trustpilot"></div>
              </div>
              <div class="card-trustpilot__body">Hands down the best service in the market. These guys are good
                and they are quick. Polite and professional, look no further your money is well spent here.</div>
            </div>
            <div class="card-trustpilot slider__item">
              <div class="card-trustpilot__header">
                <div class="card-trustpilot__header-icon"><img src="static/img/cards/Frame.jpg" alt=""></div>
                <div class="card-trustpilot__header-desc">
                  <div class="card-trustpilot__header-data">2021-07-09</div>
                  <div class="card-trustpilot__header-name">Christian</div>
                </div>
                <div class="card-trustpilot__header-logo icons-main icons-main__trustpilot"></div>
              </div>
              <div class="card-trustpilot__body">Hands down the best service in the market. These guys are good
                and they are quick. Polite and professional, look no further your money is well spent here.</div>
            </div>
            <div class="card-trustpilot slider__item">
              <div class="card-trustpilot__header">
                <div class="card-trustpilot__header-icon"><img src="static/img/cards/Frame.jpg" alt=""></div>
                <div class="card-trustpilot__header-desc">
                  <div class="card-trustpilot__header-data">2021-07-09</div>
                  <div class="card-trustpilot__header-name">Christian</div>
                </div>
                <div class="card-trustpilot__header-logo icons-main icons-main__trustpilot"></div>
              </div>
              <div class="card-trustpilot__body">Hands down the best service in the market. These guys are good
                and they are quick. Polite and professional, look no further your money is well spent here.</div>
            </div>
          </div>
        </div>
        <a class="slider__control" data-slide="prev"></a>
        <a class="slider__control" data-slide="next"></a>
      </div>
    </div>
  </section>
  <section class="container content-block__newsGuides">
    <div class="content-block__header">
      <h2 class="content-block__title">recent news &amp; guides</h2>
    </div>
    <div class="content-block__body cards-wrapper">
      <div class="scroll-slider">
        <div class="scroll-slider__wrapp">
          <div class="card-news">
            <div class="card-news__header"><img src="static/img/cards/News.jpg" alt=""></div>
            <div class="card-news__body">
              <div class="card-news__body-date">2021.09.10</div>
              <div class="card-news__body-title">WoW Shadowlands Is so Close to Release!</div>
              <div class="card-news__body-content">Now finally know the Shadowlands release date 24.11.2020. No
                more delays. This is it! You all know by now that everything will be different – new PvP Arena
                experience, more raids, improved PvE, completely original !!! PvP Arena experience, more raids,
                improved PvE, completely originalPvP Arena experience, more raids, improved PvE, completely
                originalPvP Arena experience, more raids, improved PvE, completely original</div>
            </div>
          </div>
          <div class="card-news">
            <div class="card-news__header"><img src="static/img/cards/Frame_1.jpg" alt=""></div>
            <div class="card-news__body">
              <div class="card-news__body-date">2021.09.10</div>
              <div class="card-news__body-title">WoW Shadowlands!</div>
              <div class="card-news__body-content">Completely originalPvP Arena experience, more raids, improved
                PvE, completely original</div>
            </div>
          </div>
          <div class="card-news">
            <div class="card-news__header"><img src="static/img/cards/News.jpg" alt=""></div>
            <div class="card-news__body">
              <div class="card-news__body-date">2021.09.10</div>
              <div class="card-news__body-title">WoW Shadowlands Is so Close to Release! Close to Release!</div>
              <div class="card-news__body-content">Now finally know the Shadowlands release date 24.11.2020. No
                more delays. This is it! You all know by now that everything will be different – new PvP Arena
                experience, more raids, improved PvE, completely original !!! PvP Arena experience, more raids,
                improved PvE, completely originalPvP Arena experience, more raids, improved PvE, completely
                originalPvP Arena experience, more raids, improved PvE, completely original</div>
            </div>
          </div>
          <div class="card-news">
            <div class="card-news__header"><img src="static/img/cards/Frame_2.jpg" alt=""></div>
            <div class="card-news__body">
              <div class="card-news__body-date">2021.09.10</div>
              <div class="card-news__body-title">WoW Shadowlands Is so Close to Release!</div>
              <div class="card-news__body-content">Now finally know the Shadowlands release date 24.11.2020. No
                more delays. This is it! You all know by now that everything will be different – new PvP Arena
                experience, more raids, improved PvE, completely original !!! PvP Arena experience, more raids,
                improved PvE, completely originalPvP Arena experience, more raids, improved PvE, completely
                originalPvP Arena experience, more raids, improved PvE, completely original</div>
            </div>
          </div>
          <div class="card-news">
            <div class="card-news__header"><img src="static/img/cards/News.jpg" alt=""></div>
            <div class="card-news__body">
              <div class="card-news__body-date">2021.09.10</div>
              <div class="card-news__body-title">WoW Shadowlands Is so Close to Release!</div>
              <div class="card-news__body-content">Now finally know the Shadowlands release date 24.11.2020. No
                more delays. This is it! You all know by now that everything will be different – new PvP Arena
                experience, more raids, improved PvE, completely original !!! PvP Arena experience, more raids,
                improved PvE, completely originalPvP Arena experience, more raids, improved PvE, completely
                originalPvP Arena experience, more raids, improved PvE, completely original</div>
            </div>
          </div>
          <div class="card-news">
            <div class="card-news__header"><img src="static/img/cards/News.jpg" alt=""></div>
            <div class="card-news__body">
              <div class="card-news__body-date">2021.09.10</div>
              <div class="card-news__body-title">WoW Shadowlands Is so Close to Release!</div>
              <div class="card-news__body-content">Now finally know the Shadowlands release date 24.11.2020. No
                more delays. This is it! You all know by now that everything will be different – new PvP Arena
                experience, more raids, improved PvE, completely original !!! PvP Arena experience, more raids,
                improved PvE, completely originalPvP Arena experience, more raids, improved PvE, completely
                originalPvP Arena experience, more raids, improved PvE, completely original</div>
            </div>
          </div>
          <div class="card-news">
            <div class="card-news__header"><img src="static/img/cards/News.jpg" alt=""></div>
            <div class="card-news__body">
              <div class="card-news__body-date">2021.09.10</div>
              <div class="card-news__body-title">WoW Shadowlands Is so Close to Release!</div>
              <div class="card-news__body-content">Now finally know the Shadowlands release date 24.11.2020. No
                more delays. This is it! You all know by now that everything will be different – new PvP Arena
                experience, more raids, improved PvE, completely original !!! PvP Arena experience, more raids,
                improved PvE, completely originalPvP Arena experience, more raids, improved PvE, completely
                originalPvP Arena experience, more raids, improved PvE, completely original</div>
            </div>
          </div>
        </div>
        <div class="scroll-slider__control">
          <input id="slider-control" type="range" min="0" max="100" value="0" step="0.1" name="range">
        </div>
      </div>
    </div>
  </section>
  <section class="container content-block__faq">
    <div class="content-block__header">
      <h2 class="content-block__title">faq</h2>
      <a class="link link-bg--transparent all-content" href="#">check all
        faq</a>
    </div>
    <div class="content-block__body cards-wrapper">
      <div class="card-faq adaptHeight">
        <div class="card-faq__title adaptHeight__link">I have never gave an account to another person. How does
          that work?
          <div class="rounded-triangle">
            <div class="rounded-triangle_block"></div>
          </div>
        </div>
        <div class="card-faq__content adaptHeight__content">No problem, alot services offer via Selfplay method,
          just check discription, or ask in live chat. Sometime we need an access to your account. You have to
          give us login, password and code of Battle.net authenticator (in case it is attached). We never ask for
          secret answers or something that can give full access to your account; We will need only code from
          e-mail. Do not log on after you change the password. If you do, we could not log on with new password.
          You will have to repeat this procedure again. If you need to do it for some reason, inform us about
          that. If you have the authenticator, you have to pass us the code before the service is to begin. Make
          sure you have deactivated the requirement to enter the code each time you log in game.</div>
      </div>
      <div class="card-faq adaptHeight">
        <div class="card-faq__title adaptHeight__link">Is Boosting in WoW illegal?
          <div class="rounded-triangle">
            <div class="rounded-triangle_block"></div>
          </div>
        </div>
        <div class="card-faq__content adaptHeight__content">No problem, alot services offer via Selfplay method,
          just check discription, or ask in live chat. Sometime we need an access to your account. You have to
          give us login, password and code of Battle.net authenticator (in case it is attached). We never ask for
          secret answers or something that can give full access to your account; We will need only code from
          e-mail. Do not log on after you change the password. If you do, we could not log on with new password.
          You will have to repeat this procedure again. If you need to do it for some reason, inform us about
          that. If you have the authenticator, you have to pass us the code before the service is to begin. Make
          sure you have deactivated the requirement to enter the code each time you log in game.</div>
      </div>
      <div class="card-faq adaptHeight">
        <div class="card-faq__title adaptHeight__link">I would like to participate raid by myself. What am I
          supposed to do?I don’t know tactics.
          <div class="rounded-triangle">
            <div class="rounded-triangle_block"></div>
          </div>
        </div>
        <div class="card-faq__content adaptHeight__content">No problem, alot services offer via Selfplay method,
          just check discription, or ask in live chat.Sometime we need an access to your account. You have to give
          us login, password and code of Battle.net authenticator (in case it is attached).We never ask for secret
          answers or something that can give full access to your account;We will need only code from e-mail. Do
          not log on after you change the password. If you do, we could not log on with new password. You will
          have to repeat this procedure again. If you need to do it for some reason, inform us about that. If you
          have the authenticator, you have to pass us the code before the service is to begin. Make sure you have
          deactivated the requirement to enter the code each time you log in game.No problem, alot services offer
          via Selfplay method, just check discription, or ask in live chat.Sometime we need an access to your
          account. You have to give us login, password and code of Battle.net authenticator (in case it is
          attached).We never ask for secret answers or something that can give full access to your account;We will
          need only code from e-mail. Do not log on after you change the password. If you do, we could not log on
          with new password. You will have to repeat this procedure again. If you need to do it for some reason,
          inform us about that. If you have the authenticator, you have to pass us the code before the service is
          to begin. Make sure you have deactivated the requirement to enter the code each time you log in game.No
          problem, alot services offer via Selfplay method, just check discription, or ask in live chat.Sometime
          we need an access to your account. You have to give us login, password and code of Battle.net
          authenticator (in case it is attached).We never ask for secret answers or something that can give full
          access to your account;We will need only code from e-mail. Do not log on after you change the password.
          If you do, we could not log on with new password. You will have to repeat this procedure again. If you
          need to do it for some reason, inform us about that. If you have the authenticator, you have to pass us
          the code before the service is to begin. Make sure you have deactivated the requirement to enter the
          code each time you log in game.</div>
      </div>
      <a class="link link-bg--transparent all-content" href="#">check all faq</a>
    </div>
  </section>
  <section class="container content-block__process-work">
    <div class="content-block__header">
      <h2 class="content-block__title">process of work</h2>
    </div>
    <div class="content-block__body cards-wrapper">
      <div class="card-process card-process-1">
        <div class="card-process__index">1</div>
        <div class="card-process__content">
          <div class="card-process__content-title">registration</div>
          <div class="card-process__content-desc">Register for free and get a discount on your first purchase
          </div>
        </div>
      </div>
      <div class="card-process card-process-2">
        <div class="card-process__index">2</div>
        <div class="card-process__content">
          <div class="card-process__content-title">DETAILS</div>
          <div class="card-process__content-desc">Chat with the booster before paying and specify order details
          </div>
        </div>
      </div>
      <div class="card-process card-process-3">
        <div class="card-process__index">3</div>
        <div class="card-process__content">
          <div class="card-process__content-title">PAYMENT</div>
          <div class="card-process__content-desc">Place an order and pay for it. Your money is safe.</div>
        </div>
      </div>
      <div class="card-process card-process-4">
        <div class="card-process__index">4</div>
        <div class="card-process__content">
          <div class="card-process__content-title">PROCESSING</div>
          <div class="card-process__content-desc">Wait for the booster to finish your order.</div>
        </div>
      </div>
      <div class="card-process card-process-5">
        <div class="card-process__index">5</div>
        <div class="card-process__content">
          <div class="card-process__content-title">CONFIRMATION</div>
          <div class="card-process__content-desc">Confirm the order delivery. The booster gets paid only now.
          </div>
        </div>
      </div>
      <div class="card-process card-process-6">
        <div class="card-process__index">6</div>
        <div class="card-process__content">
          <div class="card-process__content-title">REVIEW</div>
          <div class="card-process__content-desc">Leave a review about the booster’s job to help others make the
            right choice.</div>
        </div>
      </div>
      <div class="step-road">
        <div class="step-road__line"></div>
        <span></span><span></span><span></span><span></span><span></span><span></span>
      </div>
    </div>
  </section>
  <section class="container content-block__description">
    <div class="content-block__header">
      <h2 class="content-block__title">about us</h2>
    </div>
    <div class="content-block__body cards-wrapper">
      <div class="description adaptHeight">
        <div class="description__content adaptHeight__content">
          <p>Welcome to BoobBoost, a reliable World of Warcraft carry service. We’re an officially registered in
            Germany company with 9 years of experience on the market. We’ve successfully completed more than 80k
            orders at this point. Our primary aim is to connect. WoW players and time-tested skilled boosters. We
            offer a simple, but secure way to buy WoW carry raid runs and many other WoW boost for sale options.
          </p>
          <p>We strive to meet each and every customer’s needs and base our work on three main principles: trust,
            comfort, and reasonable price. Your security is also of utmost importance to us. We accept secure
            Paypal online payments, use a VPN connection, and take all precautionary measures to ensure a safe
            carry for WoW players.</p>
          <p>We are wow fans too, that’s why our key goal is to make your boosting experience smooth and
            enjoyable. The flexible options system allows you to customize your carry according to your needs and
            the intuitive website interface helps to place an order absolutely hassle-free.</p>
          <p>Still, have doubts or questions? Our operators will gladly guide you your way, 24/7!</p>
          <p>Welcome to BoobBoost, a reliable World of Warcraft carry service. We’re an officially registered in
            Germany company with 9 years of experience on the market. We’ve successfully completed more than 80k
            orders at this point. Our primary aim is to connect. WoW players and time-tested skilled boosters. We
            offer a simple, but secure way to buy WoW carry raid runs and many other WoW boost for sale options.
          </p>
          <p>We strive to meet each and every customer’s needs and base our work on three main principles: trust,
            comfort, and reasonable price. Your security is also of utmost importance to us. We accept secure
            Paypal online payments, use a VPN connection, and take all precautionary measures to ensure a safe
            carry for WoW players.</p>
          <p>We are wow fans too, that’s why our key goal is to make your boosting experience smooth and
            enjoyable. The flexible options system allows you to customize your carry according to your needs and
            the intuitive website interface helps to place an order absolutely hassle-free.</p>
          <p>Still, have doubts or questions? Our operators will gladly guide you your way, 24/7!</p>
          <p>Welcome to BoobBoost, a reliable World of Warcraft carry service. We’re an officially registered in
            Germany company with 9 years of experience on the market. We’ve successfully completed more than 80k
            orders at this point. Our primary aim is to connect. WoW players and time-tested skilled boosters. We
            offer a simple, but secure way to buy WoW carry raid runs and many other WoW boost for sale options.
          </p>
          <p>We strive to meet each and every customer’s needs and base our work on three main principles: trust,
            comfort, and reasonable price. Your security is also of utmost importance to us. We accept secure
            Paypal online payments, use a VPN connection, and take all precautionary measures to ensure a safe
            carry for WoW players.</p>
          <p>We are wow fans too, that’s why our key goal is to make your boosting experience smooth and
            enjoyable. The flexible options system allows you to customize your carry according to your needs and
            the intuitive website interface helps to place an order absolutely hassle-free.</p>
          <p>Still, have doubts or questions? Our operators will gladly guide you your way, 24/7!</p>
        </div>
        <a class="description__show adaptHeight__link" href="javascript:void(0)">show more</a>
      </div>
    </div>
  </section>
  <section class="container content-block__sub-form">
    <div class="content-block__header">
    </div>
    <div class="content-block__body cards-wrapper">
      <div class="sub-form">
        <div class="sub-form__wrapp">
          <h3>Sign up to our Newsletter and receive $5 coupon for first shopping</h3>
          <form class="subscribe-form" id="subscribe-form" action="/">
            <input class="subscribe-form__input" type="text" name="subscribe" placeholder="myemail@mail.com">
            <input class="subscribe-form__btn link link-bg" type="submit" value="subscribe">
          </form>
        </div>
        <div class="sub-form__img"> <img src="static/img/logo-icons/logo-subscribe.jpg" alt="logo-subscribe.jpg">
        </div>
      </div>
    </div>
  </section>
</div>


<?php get_footer(); ?>