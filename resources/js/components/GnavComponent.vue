<template>
<div>

    <div :class="{'header-inner': true, glass: !active}">

        <div :class="{'prof-modal': true, modal: true, glass: true, 'sec-posts': true, active: active}" @click="active = !active">
            <div id="posts-conts--inner" class="posts-conts--inner shadow-box glass scroll opacity-1" @click.stop="active = active">
            <div id="posts-cont" class="posts-cont opacity-1">
                <div class="prof-header">
                    <div class="prof-header--inner">
                        <div class="prof-icon">
                            <img src="/images/common/prof_02.webp" alt="">
                            <p class="ta-c">たから</p>
                        </div>
                        <div class="prof-skils">
                            <dl>
                                <dt><i class="fab fa-html5"></i>マークアップ</dt>
                                <dd>Pug, EJS, SASS(SCSS)</dd>
                            </dl>
                            <dl>
                                <dt><i class="fab fa-js-square"></i>フロントエンド</dt>
                                <dd>TypeScript, Vue.js</dd>
                            </dl>
                            <dl>
                                <dt><i class="fas fa-server"></i>バックエンド</dt>
                                <dd>PHP, Node.js, Python</dd>
                            </dl>
                            <dl>
                                <dt><i class="fa-solid fa-database"></i>データベース</dt>
                                <dd>MariaDB(MySQL), SQLite, MongoDB</dd>
                            </dl>
                            <dl>
                                <dt><i class="fa-solid fa-gear"></i>その他</dt>
                                <dd>npm-scripts, gulp, デザインを少々</dd>
                            </dl>
                        </div>
                        <div class="prof-github">
                            <a href="https://github.com/takaratomita" target="_blank">
                                <img src="https://github-readme-stats.vercel.app/api?username=takaratomita&count_private=true&show_icons=true&theme=cobalt" />
                            </a>
                            <a href="https://github.com/takaratomita" target="_blank">
                                <img src="https://github-readme-stats.vercel.app/api/top-langs/?username=takaratomita&layout=compact&theme=cobalt&ver=3.0" />
                            </a>
                        </div>
                    </div>
                </div>
                <p class="posts-txt">現在大学四年生。<br>大学一年からWEB制作の会社でアルバイトを開始。<br>今はモダンなWEB技術に興味があり、React、AWSを勉強中。<br>趣味はアニメ、漫画、読書、料理それとWEBを触ること。</p>
            </div>
        </div>
        </div>
                <nav class="g-nav">
                <ul>
                    <li><a class="shadow-txt hov hov-txt" href="/" @mouseover="hovFlug = false" >Home</a></li>
                    <li><a class="shadow-txt hov hov-txt" href="/works/"
                    @mouseover="hovFlug = true"
                    >Works</a>
                    <ul :class="{'works-modal':true,
                    active: hovFlug, 'shadow-box':true,}"
                     @mouseover="hovFlug = true" @mouseleave="hovFlug = false">
                        <li @click="hovFlug = false"><a href="/works/#personal">
                            <span class="">個人で作ったもの</span>
                            <div class="cover"></div>
                            <img src="/images/common/top-work_01.webp" alt="">
                            </a>
                        </li>
                        <li @click="hovFlug = false"><a href="/works/#company">
                            <span class="">会社で作ったもの</span>
                            <div class="cover"></div>
                            <img src="/images/common/top-work_02.webp" alt="">
                            </a>
                        </li>
                        <li @click="hovFlug = false"><a href="/works/#friend">
                            <span class="">友達と作ったもの</span>
                            <div class="cover"></div>
                            <img src="/images/common/top-work_03.webp" alt="">
                            </a>
                        </li>
                    </ul>
                    </li>
                    <li><a class="shadow-txt hov hov-txt" href="/blogs/" @mouseover="hovFlug = false">Blog</a></li>
                    <li class="prof-ico shadow-txt" @click="active = !active"><img src="/images/common/prof_02.webp" alt=""></li>
                </ul>
        </nav>
    </div>
</div>
</template>

<script>
    export default {
        data() {
            return {
                active: false,
                hovFlug: false,
                aos: 'fade-up',
            }
        }
    }
</script>
