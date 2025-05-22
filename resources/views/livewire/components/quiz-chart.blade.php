<div wire:ignore>
  <div class="max-w w-full bg-white rounded-lg shadow-sm dark:bg-gray-800">
    <div class="flex justify-between p-1 md:p-6 pb-0 md:pb-0">
      <div>
        <h5 class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2">Quiz chart</h5>
      </div>
    </div>
    <div id="user-chart" class="px-2.5"></div>
    <div
      class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between mt-5 p-4 md:p-6 pt-0 md:pt-0">
      <div class="flex justify-between items-center pt-5">
        <!-- Button -->
        <select wire:model.live='userDate' wire:change="updateUserChart" id="countries"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-4 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
          <option value="5">Yesterday</option>
          <option value="10">Today</option>
          <option value="25">Last 7 days</option>
          <option value="50">Last 30 days</option>
          <option value="100">Last 90 days</option>
        </select>
      </div>
    </div>
  </div>
  <script>
    userModalData = {!! json_encode($users) !!}; // Convert Laravel iable to JavaScript
    categoriesUsers = userModalData.map(item => item.x); // Extract dates
    dataValuesUsers = userModalData.map(item => item.y); //


    function getChartOptions(categoriesUsers, dataValuesUsers) {
      return {
        xaxis: {
          show: true,
          categories: categoriesUsers,
          labels: {
            show: true,
            style: {
              fontFamily: "Inter, sans-serif",
              cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
            }
          },
          axisBorder: { show: false },
          axisTicks: { show: false },
        },
        yaxis: {
          show: true,
          labels: {
            show: true,
            style: {
              fontFamily: "Inter, sans-serif",
              cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
            },
            formatter: function (value) {
              return value;
            }
          }
        },
        series: [
          {
            name: 'Users',
            data: dataValuesUsers,
            color: "#7E3BF2",
          },
        ],
        chart: {
          sparkline: { enabled: false },
          height: "100%",
          width: "100%",
          type: "area",
          fontFamily: "Inter, sans-serif",
          dropShadow: { enabled: false },
          toolbar: { show: false },
        },
        tooltip: {
          enabled: true,
          x: { show: false },
        },
        fill: {
          type: "gradient",
          gradient: {
            opacityFrom: 0.55,
            opacityTo: 0,
            shade: "#1C64F2",
            gradientToColors: ["#1C64F2"],
          },
        },
        dataLabels: { enabled: false },
        stroke: { width: 6 },
        legend: { show: false },
        grid: { show: false },
      };
    }
    var chartUser;
    if (document.getElementById('user-chart') && typeof ApexCharts !== 'undefined') {
      chartUser = new ApexCharts(document.getElementById('user-chart'), getChartOptions(categoriesUsers, dataValuesUsers));
      chartUser.render();
    }

    function renderUserChart(categoriesUsers, dataValuesUsers) {
      if (document.getElementById('user-chart') && typeof ApexCharts !== 'undefined') {
        if (!chartUser) {
          // Create the chart if it doesn't exist
          chartUser = new ApexCharts(document.getElementById('user-chart'), getChartOptions(categoriesUsers, dataValuesUsers));
          chartUser.render();
        } else {
          // Update the chart dynamically
          chartUser.updateOptions({
            xaxis: {
              categories: categoriesUsers,
            }
          });

          chartUser.updateSeries([
            {
              data: dataValuesUsers
            }
          ]);
        }
      }
    }

    Livewire.on('updateUserChart', chartData1 => { // Listen for the event
      //userModalData = Object.assign({}, chartData1);
      const jsonData = JSON.stringify(chartData1[0]);
      const dataArray = JSON.parse(jsonData);

      // Map over the array
      const names = dataArray.map(item => item.x);
      const value = dataArray.map(item => item.y);
      console.log(value);
      renderUserChart(names, value);
    });

  </script>
</div>