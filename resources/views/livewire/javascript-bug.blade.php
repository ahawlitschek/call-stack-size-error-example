@push('scripts')

    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js" defer></script>

    <script>
        function testChart() {
            return {
                config: null,
                chart: null,
                initChart(element) {

                    this.config = {
                        data: {
                            datasets: [
                                {
                                    label: 'Set 1',
                                    backgroundColor: '#043C7B',
                                    data: [10, 30, 7],
                                    yAxisID: 'left',
                                },
                                {
                                    label: 'Set 2',
                                    backgroundColor: '#99b8de',
                                    data: [0.4, 0.7, 0.8],
                                    yAxisID: 'right',
                                }
                            ],
                            labels: ['A', 'B', 'C']
                        },
                        type: 'bar',
                        options: {
                            legend: {
                                display: true,
                                position: 'bottom',
                            },
                            scales: {
                                xAxes: [{
                                    display: true,
                                }],
                                yAxes: [{
                                    ticks: {
                                        min: 0,
                                        precision: 0,
                                    },
                                    scaleLabel: {
                                        display: true,
                                        labelString: 'Anzahl'
                                    },
                                    id: 'left',
                                }, {
                                    position: 'right',
                                    ticks: {
                                        min: 0,
                                        callback: function (label, index, labels) {
                                            return parseFloat(label).toLocaleString() + ' l';
                                        }
                                    },
                                    scaleLabel: {
                                        display: true,
                                        labelString: 'Volumen in l'
                                    },
                                    gridLines: {
                                        drawOnChartArea: false
                                    },
                                    id: 'right',
                                }],
                            },
                        },
                    };

                    this.chart = new Chart(element, this.config);
                },
            }
        }
    </script>

@endpush

<div x-data=""
     x-init="">

    <h1>Memory Bug</h1>
    <p>Press the Button and look at the console</p>

    <span wire:click="showChart" class="inline-flex rounded-md shadow-sm">
      <button type="button"
              class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150">
        Show Blade if
      </button>
    </span>

    @if($show)

        <div x-data="{show: false}">

               <span @click="show = true;" class="inline-flex rounded-md shadow-sm">
                  <button type="button"
                          class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150">
                    Show chart with Alpine
                  </button>
                </span>

            <div
                x-show.transition="show"
            >

                <div
                    wire:ignore
                    x-data="testChart()"
                    x-init="initChart($refs.chart)"
                    class="mt-2 bg-white shadow rounded-lg px-6 py-6">
                    <canvas x-ref="chart"></canvas>
                </div>
            </div>
        </div>
    @endif
</div>

