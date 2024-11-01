<div class="container">
    <div class="row">
        <div class="col-width m-auto dynamic-box-color">
            <div class="box m-auto">
                <p class="main-head">Standard Deviation Calculator</p>
                <p class="head-para mb-20">Enter the comma separated values in the box to find standard deviation using standard deviation calculator.
                </p>

                <form class="form" id="calculate">
                    <div class="d-flex align-items-center mb-10">
                        <input type="radio" onclick="sample('SD');" checked="checked" id="sample1" value="sample1" name="radio">
                        &nbsp;
                        <label type="button" for="sample1">Sample</label>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" onclick="population('SD');" id="population1" value="population1" name="radio">
                        &nbsp;
                        <label type="button" for="population1">Population</label>
                    </div>
                    <textarea type="text" class="form-control mb-2 freq" placeholder="10,34,23,54,9" required="required" id="input" onkeyup="removeSpaces(this)" onkeypress="return validtionInput(event.key)">10,34,23,54,9</textarea>
                    <div class="d-flex align-items-center">
                        <div class="col-width">
                            <button class="calc_btn bg-blue text-white" type="button">Calculate</button>
                        </div>
                        <div class="col-width text-right">
                            <button type="button" onclick="resetBtn();" class="res_btn bg-white">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-width m-auto dynamic-box-color">
            <div class="box">

                <div class="d-none" id="tool_results">
                    <div class="result-div text-center">

                        <p class="p-headi center-it fw-bold" id="title"></p>
                        <span id="sd_copy" class="color-3366ff center-it font-24"><b id="sd_pop"></b><b id="sd_sample"></b></span>
                        <div class="genderdiv d-flex justify-content-center mt-3">
                            <div class="gender-check">
                                <input type='radio' id='sampl_btn' checked='checked' name='radio'>
                                <label type="button" onclick="sample('SD');" for='sampl_btn'>Sample</label>
                                <input type='radio' id='popul_btn' name='radio'>
                                <label type="button" onclick="population('SD');" for='popul_btn'>Population</label>
                            </div>
                        </div>
                        <div id="population_div">
                            <div class="collap-data d-flex flex-column align-items-center justify-content-center">
                                <div class="value-row d-flex">
                                    <span>Variance</span>
                                    <span class="color-3366ff" id="variance_pop"></span>
                                    <span class="color-3366ff" id="variance_sample"></span>
                                </div>
                                <div class="value-row d-flex">
                                    <span class="power">Differences <sub class="color-gray-font-18  ">(x-<span class="text-overline">x</span>)</sub></span><span class="diff color-3366ff" id="diff">0</span>
                                </div>
                                <div class="value-row d-flex">
                                    <span class="power">Differences<sup>2</sup> <sub class="color-gray-font-18 ">(x-<span class="text-overline">x</span>)<small><sup>2</sup></sub></small></span><span class="diff_sqr color-3366ff" id="diff_sqr">0</span>
                                </div>
                                <div class="value-row d-flex">
                                    <span class="power">Sum Of Differences
                                        <sub class="color-gray-font-18 ">&sum;|x-<span class="text-overline">x</span>|<small><sup>2</sup></small>
                                        </sub>
                                    </span>
                                    <span class="sum_diff_sqr color-3366ff" id="sum_diff_sqr">0</span>
                                </div>
                                <div class="value-row-last d-flex">
                                    <span>Mean</span>
                                    <span class="color-3366ff" id="mean_c">0</span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>