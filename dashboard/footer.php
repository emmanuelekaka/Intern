

                    </div>

            </div>
        </div>
    </div>
    <div class="foot">&copy2022 BandaComputerCenter | Powered by @emmaSoft

    </div>
    <Script type="text/javascript">
        let tut = false;
        let items =document.querySelectorAll('.span-name')
        let head =document.querySelector('.p-head')
        let btnctrl =document.querySelector('#controller')
        btnctrl.style.color = "red";
        btnctrl.addEventListener('click',(e)=>{
            // tutology setter
            tut = (!tut);
            // condition to check tutology
            if (tut === true){
                btnctrl.style.color = "white";
                items.forEach(item=>{
                item.style.display = "none";
                })
                head.style.display = "none";
            }else{
                btnctrl.style.color = "red";
                items.forEach(item=>{
                item.style.display = "initial";
                })
                head.style.display = "initial";

            }
            
        })
    </script> -->
    <!-- <script src="../static/js/bootstrap.bundle.min.js"></script> -->
    <!--  <script src="../js/jquery.min.js"></script> -->
</body>
</html>