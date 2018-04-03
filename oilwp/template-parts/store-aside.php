                            <aside class="aside">
                                <div class="aside-title">
                                    <div class="aside-title__text">Подбор по марке авто</div>
                                    <div class="aside-title__icon active">
                                        <img src="<?php echo get_template_directory_uri()?>/static/img/assets/aside/down-arrow.png">
                                    </div>
                                </div>
                                <div class="aside-content">
                                    <form class="aside-form">
                                        <div class="aside-form__label">Введите данные:</div>
                                        <div class="form-group">
                                            <input type="text" placeholder="Модель">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" placeholder="Год выпуска">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" placeholder="Объем двигателя">
                                        </div>
                                        <div class="aside-form__label">Что ищем :</div>
                                        <div class="form-group form-group__checkbox">
                                            <input type="checkbox" id="oils">
                                            <label for="oils">Масла</label>
                                        </div>
                                        <div class="form-group form-group__checkbox">
                                            <input type="checkbox" id="autoparts">
                                            <label for="autoparts">Автозапчасти</label>
                                        </div>
                                        <div class="form-group form-group__button">
                                            <button class="button green">Подобрать</button>
                                        </div>
                                    </form>
                                </div>
                            </aside>
                            <?php get_template_part( 'template-parts/store', 'banner'); ?>