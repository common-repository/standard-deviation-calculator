function population(tool) {
    jQuery(function ($) {
        $("#popul_btn").prop("checked", true);
        $("#population1").prop("checked", true);
        $("#title").text("Standard Deviation (σ)");
        $("#title_variance").text("Population Variance");
        $("#title_cof_var").text("Population Coefficient of Variation");
        $("#title_covariance").text("Population Covariance");
        $("#title_arithmetic").text("Arithmetic Mean");
        $("#sd_sample").hide();
        $("#sd_pop").show();
        $("#variance_sample").hide();
        $("#variance_pop").show();
        $("#covariance_pop").show();
        $("#covariance_sample").hide();
        $("#cof_var_sample").hide();
        $("#cof_var_perc_sample").hide();
        $("#cof_var_pop").show();
        $("#cof_var_perc_pop").show();
    });
}
function sample(tool) {
    jQuery(function ($) {
        $("#sampl_btn").prop("checked", true);
        $("#sample1").prop("checked", true);
        $("#title").text("Standard Deviation (s)");
        $("#title_variance").text("Sample Variance");
        $("#title_cof_var").text("Sample Coefficient of Variation");
        $("#title_covariance").text("Sample Covariance");
        $("#title_arithmetic").text("Arithmetic Mean");
        $("#sd_sample").show();
        $("#sd_pop").hide();
        $("#variance_sample").show();
        $("#variance_pop").hide();
        $("#covariance_pop").show();
        $("#covariance_sample").hide();
        $("#cof_var_sample").show();
        $("#cof_var_perc_sample").show();
        $("#cof_var_pop").hide();
        $("#cof_var_perc_pop").hide();
    });
}
function removeSpaces(obj) {
    var x = jQuery(obj).val();
    if (x.charAt(0) === ',') {
        x = x.substring(1);
    }
    x = x.replace(/\n/g, ",");
    x = x.replace(/\t/g, ",");
    x = x.replace(" ", ",");
    x = x.replace(",,", ",");
    x = x.replace("--", "-");
    x = x.replace("-0,", "0,");
    x = x.replace(".,", ",");
    x = x.replace("-,", ",");
    x = x.replace(".-", ".");
    jQuery(obj).val(x);
    setTimeout(function () {
        removeSpaces(obj);
    }, 0.5);
}

function validtionInput(e) {
    return /[0-9+-.,]/i.test(e);
}

function resetBtn() {
    jQuery("#tool_works").show();
    jQuery("#tool_results").hide();
    jQuery(".freq").val('');
}

jQuery(document).ready(function ($) {

    $('.calc_btn').on('click', function () {

        let input = $("#input").val();
        let org_text_arr = Array.from(input.split(','), Number);
        var vld = org_text_arr.includes(NaN);
        if (vld == true) {
            return validtionExp();
        }
        // debugger;
        const ending_with_comma = /\,$/g;
        if (input.match(ending_with_comma)) {
            const lastIndexOfL = input.lastIndexOf(",");
            $("#input").val(
                input.slice(0, lastIndexOfL) + input.slice(lastIndexOfL + 1)
            );
            input = $("#input").val();
        }
        if (input == "") {
            alert("Please Enter at least two comma(,) seprated values!");
            return 0;
        }
        var SD = CalculateSD(input);
        var SD_population = SD.SD_population;
        var SD_sample = SD.SD_sample;
        var variance_sample = SD.variance_sample;
        var variance_population = SD.variance_population;
        var diff = SD.diff;
        var diff_sqr = SD.diff_sqr;
        var sum_diff_sqr = SD.sum_diff_sqr;
        var mean = parseFloat(SD.mean.toFixed(3));
        var sum = SD.sum;
        if ($("#population1").is(":checked") == true) {
            $("#sd_sample").hide();
            $("#variance_sample").hide();
            $("#title").text("Standard Deviation (σ)");
        } else {
            $("#sd_pop").hide();
            $("#variance_pop").hide();
            $("#title").text("Standard Deviation (s)");
        }
        $("#sd_pop").text(SD_population.toFixed(3).replace(/[.,]000$/, ""));
        $("#sd_sample").text(SD_sample.toFixed(3).replace(/[.,]000$/, ""));
        $("#variance_pop").text(
            variance_population.toFixed(3).replace(/[.,]000$/, "")
        );
        $("#variance_sample").text(
            variance_sample.toFixed(3).replace(/[.,]000$/, "")
        );
        $("#diff").text(diff);
        $("#diff_sqr").text(diff_sqr);
        $("#sum_diff_sqr").text(sum_diff_sqr.toFixed(3).replace(/[.,]000$/, ""));
        $("#mean_c").text(mean.toFixed(3).replace(/[.,]000$/, ""));
        // $("#sum_c").text(sum.toFixed(3).replace(/[.,]000$/, ""));
        $("#tool_works").hide();
        $("#tool_results").show();
    });
    function CalculateSD(input = "") {
        const clean_input = input.split(",");
        var sum = 0;
        var v;
        var temp1 = 0;
        const diff = [];
        const diff_sqr = [];
        var sum_diff_sqr = 0;
        const n = clean_input.length;
        if (clean_input.length < 2) {
            alert("Please Enter at least two comma(,) seprated values!");
            return 0;
        } else {
            for (var i = 0; i < n; i++) {
                v = parseFloat(clean_input[i]);
                sum += v;
            }
            const mean = sum / n;
            for (var i = 0; i < n; i++) {
                v = parseFloat(clean_input[i]);
                diff[i] = (v - mean).toFixed(2).replace(/[.,]00$/, "");
                diff_sqr[i] = (diff[i] ** 2).toFixed(2).replace(/[.,]00$/, "");
                temp1 += (v - mean) ** 2;
            }
            for (var i = 0; i < n; i++) {
                v = parseFloat(diff_sqr[i]);
                sum_diff_sqr += v;
            }
            var variance_sample = temp1 / (n - 1);
            var variance_population = temp1 / n;
            var SD_sample = Math.sqrt(variance_sample);
            var SD_population = Math.sqrt(variance_population);
            return {
                SD_population,
                SD_sample,
                variance_population,
                variance_sample,
                temp1,
                diff,
                diff_sqr,
                sum_diff_sqr,
                mean,
                sum,
                n
            };
        }
    }
});
