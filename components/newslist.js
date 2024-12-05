import newsItem from "./newsItem.js";

export default {
    components: {
        newsItem
    },
    template: `
    <div class="row">
        <newsItem 
        v-for="news in news"
        :href="news.href"
        :src="news.img"
        :content="news.content"
        >
        </newsItem>
        <div class="card col-sm-3 d-flex justify-content-center align-items-center ">
            <a href="#" class="text-grey">
                <h1 style="line-height:7rem;"><i class="fa-regular fa-circle-up fa-rotate-90 fa-2xl"></i></h1>
                <h6 style="font-weight:bold;">更 多 消 息 </h6>
            </a>
        </div>
    </div>
    `,
    data() {
        return {
            news: [
                { img: "images/room.jpg", content: "勤美門市即將開幕！延續REON活潑風格！<br>2024/08/22", href:"#"},
                { img: "images/50percentoff.jpg", content: "慶祝REON五歲了！多樣商品五折優惠！<br>2024/08/19", href:"#" },
                { img: "images/news3.jpg", content: "LENS TOWN進駐REON啦！多款系列任挑！<br>2024/07/30", href:"#" }
            ]
        }
    },
}