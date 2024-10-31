    <!-- footer -->
    <section id="footer">
        <div class="container-fluid ">
            <div class="row">
                <!-- 常見問題 -->
                <div class="col-md-2 footer-flex">
                    <div class="footer_title">常見問題</div>
                    <div class="footer_content">購物須知<br>下單流程<br>退換貨流程<br>加入會員</div>
                </div>
                <!-- 關於我們 -->
                <div class="col-md-2 footer-flex">
                    <div class="footer_title">關於我們</div>
                    <div class="footer_content">品牌理念<br>門市資訊<br>最新消息</div>
                </div>
                <!-- 座右銘 -->
                <div class="col-md-4 motto">
                    <div class="footer_title mottoline">尋找你眼裡的光</div>
                    <div class="social-media-logo">
                        <h5>
                            <a href="#" title="instagram"><i class="fa-brands fa-instagram"></i></a>
                            <a href="#" title="facebook"><i class="fa-brands fa-facebook"></i></a>
                            <a href="#" title="line"><i class="fa-brands fa-line"></i></a>
                            <a href="#" title="youtube"><i class="fa-brands fa-youtube"></i></a>
                        </h5>
                    </div>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-reon btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        聯絡我們
                    </button>

                    <!-- Modal -->
                    <form id="form1" name="form1" method="post">
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-content contact-color">
                                    <div class="modal-header">
                                        <p class="modal-title fs-6" id="exampleModalLabel" style="font-size: 12px;">聯絡我們</p>
                                        <!-- 叉叉按鍵 -->
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-sm-9 offset-2 ">
                                                <div class="row mb-3 input-group input-group-sm">
                                                    <input type="text" class="form-control" name="cname" id="cname" placeholder="姓名 Name" required>
                                                </div>
                                                <div class="row mb-3 input-group input-group-sm">
                                                    <input type="number" class="form-control" name="tel" id="tel" placeholder="連絡電話 TEL" required>
                                                </div>
                                                <div class="row mb-3 input-group input-group-sm">
                                                    <input type="email" class="form-control" name="email" id="email" placeholder="電子信箱 Email" required>
                                                </div>
                                                <div class="row mb-3 input-group input-group-sm">
                                                    <input type="text" class="form-control" name="address" id="address" placeholder="聯絡地址 Address" required>
                                                </div>
                                                <div class="row mb-3 input-group input-group-sm">
                                                    <textarea rows="6" class="form-control" name="message" id="message" placeholder="我有話要說 Message" required></textarea>
                                                    <input type="hidden" name="flag" id="flag" value="form1">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="reset" name="reset" id="reset" class="btn btn-secondary btn-sm">重填RESET</button>
                                        <button type="submit" name="submit" id="submit" class="btn btn-reon-b-y btn-sm">送出SUBMIT</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- 公司簡介 -->
                <div class="col-md-4 footer-flex">
                    <div class="footer_title">R E O N</div>
                    <div class="footer_content">里光眼鏡有限公司<br>統一編號：88991122<br>台中市西屯區工業路一段100號<br>04-22990808</div>
                </div>
            </div>
        </div>
    </section>
    <!-- copyright -->
    <section id="copyright">
        <div class="copyright-area">
            <p>COPYRIGHT © REON co., ltd.</p>
            <p>隱私權政策|免責聲明</p>
        </div>
    </section>



