<!-- /.navbar-top-links -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">      
                <?php $kd_status = $this->session->userdata('kd_status');
					$sql = $this->db->select('A.*,B.*')
								->from ('akses as A')
								->join ('modul as B','A.id_modul = B.id_modul','left')
								->where ('A.kd_status',$kd_status)
								->where ('A.active',1)
								->where ('B.id_level',0)
								->order_by ('B.sort','asc')
								->get()->result();
					foreach ($sql as $row)
					{
						$sub = $this->db->select('A.*,B.*')
								->from ('akses as A')
								->join ('modul as B','A.id_modul = B.id_modul','left')								
								->where ('A.active',1)
								->where ('A.kd_status',$kd_status)
								->where ('B.id_level',1)
								->where	('B.id_modul_parent',$row->id_modul)
								->order_by ('B.sort','asc')
								->get()->result();
						$child = count($sub);
						$arrow = ($child > 0) ? 'fa arrow' : '';
						echo '<li><a href="'.base_url($row->link).'"><i class="fa '.$row->icon.'"></i> '.$row->nama_modul.'<span class="'.$arrow.'"></span></a>';
								  
						foreach ($sub as $val){
							echo '<ul class="nav nav-second-level"><li>
                                	<a href="'.base_url($val->link).'"><i class="fa '.$row->icon.'"></i> '.$val->nama_modul.'</a>
                            	 </li></ul>';
								  		}
							echo '</li>';
					}
                
                ?>
                 
                </ul>

            </div>
            <!-- /.sidebar-collapse -->

        </div>
        <!-- /.navbar-static-side -->
