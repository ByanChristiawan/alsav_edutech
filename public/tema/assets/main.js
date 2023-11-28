const loader = document.getElementById("bg-loader")
const years = document.getElementById("year")
const sidebarItems = document.querySelectorAll('#sidebar li');
const sideBar = document.getElementById("sidebar")
const present = document.getElementById("present")
const iconPresent = document.getElementById("iconPresent")
const btnYear = document.getElementById("arrow-default")
const countSlider = document.getElementById("countSlider")
const appPresent = document.getElementById("right-app")
const images = document.querySelectorAll('.slider img');
const thumbnails = document.querySelectorAll('.thumbnails img');
const sliderContainer = document.querySelector('.slider-container');
const prevBtn = document.querySelector('.prev-btn');
const nextBtn = document.querySelector('.next-btn');
const containerThumb = document.querySelector(".thumbnails")
const players = document.querySelectorAll('.youtube-player')
const videos = document.getElementById('videos')
const titleVideo = document.querySelectorAll('.title')

document.addEventListener("DOMContentLoaded", () => {
        loader.classList.remove("flex")
        loader.classList.add("hidden")
        document.getElementById("app").classList.remove("hidden")

        if (images.length === 0) {
            sliderContainer && sliderContainer.classList.add("hidden")
            sliderContainer && sliderContainer.classList.add("add-bg")
            prevBtn && prevBtn.classList.add("hidden")
            nextBtn && nextBtn.classList.add("hidden")
            present.classList.add("hidden")
            // sideBar.classList.remove("h-[360px]")
            sideBar.style.height = "85%"
        }

        if (players.length === 0) {
            videos && videos.classList.add('add-bg')
            if(!players) {
                playerssideBar.style.height = "85%"
            }
        }

        if (players.length > 0) {
            present.classList.add("hidden")
        }

        if (players.length === 1) {
                players[0].style.width = '880px';
            } else {
                players.forEach(function (player) {
                player.style.width = '440px';
            });
        }

        if (titleVideo.length === 1) {
                titleVideo[0].style.width = '880px';
            } else {
                titleVideo.forEach(function (title) {
                title.style.width = '440px';
            });
        }

        if (!document.querySelector("#sidebar a li").getAttribute("class").includes("active")) {
            sideBar.classList.remove("h-[85%]")
            sideBar.classList.add("height-custom")
        }

        if (images.length > 0) {
            images[0].addEventListener("load", () => {
                sliderContainer.classList.remove("hidden")
                if (images.length < 3) {
                    prevBtn.style.display = 'none';
                    nextBtn.style.display = 'none';
                } else {
                    prevBtn.style.display = 'block';
                    nextBtn.style.display = 'block';
                }
            })
        }

        present.addEventListener("mouseover", () => {
            iconPresent.setAttribute("fill", "white")
        })

        present.addEventListener("mouseout", () => {
            iconPresent.setAttribute("fill", "#141414")
        })

        btnYear.addEventListener("mouseover", () => {
            btnYear.setAttribute("fill", "white")
            btnYear.querySelectorAll("path")[1].setAttribute("stroke", "black")
        })

        btnYear.addEventListener("mouseout", () => {
            btnYear.setAttribute("fill", "none")
            btnYear.querySelectorAll("path")[1].setAttribute("stroke", "white")
        });

        let currentSlide = 0;

        if (images.length > 0) {
            images[currentSlide].style.display = 'block';
            thumbnails[currentSlide].classList.add('activer');
        }

        function updateCount() {
            countSlider.textContent = `Slide ${currentSlide + 1}/${images.length}`;
        }

        function showSlide(n) {
            images[currentSlide].style.display = 'none';
            thumbnails[currentSlide].classList.remove('activer');
            updateCount();
            currentSlide = (n + images.length) % images.length;
            images[currentSlide].style.display = 'block';
            thumbnails[currentSlide].classList.add('activer');
            prevBtn.classList.toggle('disabled', currentSlide === 0);
            nextBtn.classList.toggle('disabled', currentSlide === images.length - 1);
            containerThumb.style.left = currentSlide * -120 + 'px';
        }


        function nextSlide() {
            if (currentSlide < images.length - 1) {
                showSlide(currentSlide + 1);
                updateCount();
            }
        }

        function prevSlide() {
            if (currentSlide > 0) {
                showSlide(currentSlide - 1);
                updateCount();
            }
        }

        if (!players && !sliderContainer.getAttribute("class").includes("add-bg")) {
            updateCount();
        }

        function toggleFullscreen() {
            if (!document.fullscreenElement) {
                if (sliderContainer.requestFullscreen) {
                    sliderContainer.requestFullscreen();
                } else if (sliderContainer.mozRequestFullScreen) {
                    sliderContainer.mozRequestFullScreen();
                } else if (sliderContainer.webkitRequestFullscreen) {
                    sliderContainer.webkitRequestFullscreen();
                } else if (sliderContainer.msRequestFullscreen) {
                    sliderContainer.msRequestFullscreen();
                }

                images.forEach(image => {
                    image.classList.remove("heightSlider")
                });
            } else {
                exitFullscreen()
            }
        }

        function exitFullscreen() {
            if (document.exitFullscreen) {
                document.exitFullscreen();
            } else if (document.mozCancelFullScreen) {
                document.mozCancelFullScreen();
            } else if (document.webkitExitFullscreen) {
                document.webkitExitFullscreen();
            } else if (document.msExitFullscreen) {
                document.msExitFullscreen();
            }
        }

        document.addEventListener('fullscreenchange', function (event) {
            if (!document.fullscreenElement) {
                images.forEach(image => {
                    image.classList.add("heightSlider")
                });
            }
        });

        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape') {
                exitFullscreen();
            }
        });

        nextBtn && nextBtn.addEventListener('click', nextSlide);
        prevBtn && prevBtn.addEventListener('click', prevSlide);
        present && present.addEventListener('click', toggleFullscreen);

        thumbnails.forEach((thumbnail, index) => {
            thumbnail.addEventListener('click', () => {
                showSlide(index);
            });
        });


        document.addEventListener("keydown", (e) => {
            if (e.key === "ArrowLeft") {
                prevSlide();
            }
            if (e.key === "ArrowRight") {
                nextSlide();
            }
        });


        const loadPlayer = function (event) {
            let target = event.currentTarget
            let iframe = document.createElement('iframe')

            iframe.height = target.clientHeight
            iframe.width = target.clientWidth
            iframe.src = 'https://www.youtube.com/embed/' + target.dataset.videoId + '?autoplay=1'
            iframe.setAttribute('frameborder', 0)
            iframe.setAttribute('allow', 'autoplay')
            iframe.setAttribute('allowfullscreen', '')
            iframe.setAttribute('class', 'rouded-lg')

            target.classList.remove('pristine')

            if (target.children.length) {
                target.replaceChild(iframe, target.firstElementChild)
            } else {
                target.appendChild(iframe)
            }
        }

        let config = {
            once: true
        }

        Array.from(players).forEach(function (player) {
            player.addEventListener('click', loadPlayer, config)
        })

    })

    ! function (e) {
        "function" == typeof define && define.amd ? define(e) : e()
    }(function () {
        var e, t = ["scroll", "wheel", "touchstart", "touchmove", "touchenter", "touchend", "touchleave",
            "mouseout", "mouseleave", "mouseup", "mousedown", "mousemove", "mouseenter", "mousewheel",
            "mouseover"
        ];
        if (function () {
                var e = !1;
                try {
                    var t = Object.defineProperty({}, "passive", {
                        get: function () {
                            e = !0
                        }
                    });
                    window.addEventListener("test", null, t), window.removeEventListener("test", null, t)
                } catch (e) {}
                return e
            }()) {
            var n = EventTarget.prototype.addEventListener;
            e = n, EventTarget.prototype.addEventListener = function (n, o, r) {
                var i, s = "object" == typeof r && null !== r,
                    u = s ? r.capture : r;
                (r = s ? function (e) {
                    var t = Object.getOwnPropertyDescriptor(e, "passive");
                    return t && !0 !== t.writable && void 0 === t.set ? Object.assign({}, e) : e
                }(r) : {}).passive = void 0 !== (i = r.passive) ? i : -1 !== t.indexOf(n) && !0, r.capture =
                    void 0 !== u && u, e.call(this, n, o, r)
            }, EventTarget.prototype.addEventListener._original = e
        }
    });
