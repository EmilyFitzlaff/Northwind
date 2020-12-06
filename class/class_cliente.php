<?php
    require_once('class_connection.php');

    class Cliente {
        private $codigo;
        private $companyName;
        private $contactName;
        private $contactTitle;
        private $address;
        private $city;
        private $region;
        private $postalCode;
        private $country;
        private $phone;
        private $cep;
        private $fax;

        public function getCodigo() {
            return $this->codigo;
        }

        public function setCodigo($codigo) {
            $this->codigo = $codigo;
        }

        public function getCompanyName() {
            return $this->companyName;
        }

        public function setCompanyName($companyName) {
            $this->companyName = $companyName;
        }

        public function getContactName() {
            return $this->contactName;
        }

        public function setContactName($contactName) {
            $this->contactName = $contactName;
        }

        public function getContactTitle() {
            return $this->contactTitle;
        }

        public function setContactTitle($contactTitle) {
            $this->contactTitle = $contactTitle;
        }

        public function getAddress() {
            return $this->address;
        }

        public function setAddress($address) {
            $this->address = $address;
        }

        public function getCity() {
            return $this->city;
        }

        public function setCity($city) {
            $this->city = $city;
        }

        public function getRegion() {
            return $this->region;
        }

        public function setRegion($region) {
            $this->region = $region;
        }

        public function getPostalCode() {
            return $this->postalCode;
        }

        public function setPostalCode($postalCode) {
            $this->postalCode = $postalCode;
        }

        public function getCountry() {
            return $this->country;
        }

        public function setCountry($country) {
            $this->country = $country;
        }

        public function getPhone() {
            return $this->phone;
        }

        public function setPhone($phone) {
            $this->phone = $phone;
        }

        public function getFax() {
            return $this->fax;
        }

        public function setFax($fax) {
            $this->fax = $fax;
        }

        private function SelectAll() {
            $consulta = Conexao::Conectar()->prepare("SELECT * FROM customers");
            $consulta->execute();

            while($aLinha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $oCliente = new Cliente;
                $oCliente->setCodigo($aLinha['customer_id']);
                $oCliente->setCompanyName($aLinha['company_name']);
                $oCliente->setContactName($aLinha['contact_name']);
                $oCliente->setContactTitle($aLinha['contact_title']);
                $oCliente->setAddress($aLinha['address']);
                $oCliente->setCity($aLinha['city']);
                $oCliente->setRegion($aLinha['region']);
                $oCliente->setPostalCode($aLinha['postal_code']);
                $oCliente->setCountry($aLinha['country']);
                $oCliente->setPhone($aLinha['phone']);
                $oCliente->setFax($aLinha['fax']);
                $aResultado[] = $oCliente;
            }
            return $aResultado;  
        }

        public function CreateConsulta() {
            $aDados = $this->SelectAll();

            if (empty($aDados)) {
            ?>
                <div class="alert alert-secondary" role="alert">
                    <span>Não há dados para exibição!</span>
                </div>
            <?php
            } else {      
                ?> 
                <div class="accordion" id="accordionExample"> 
                <?php          
                foreach ($aDados as $oObjeto) {
                ?>
                <div class="card">
                    <div class="card-header" id="<?php echo $oObjeto->getCodigo(); ?>">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse<?php echo $oObjeto->getCodigo(); ?>" aria-expanded="true" aria-controls="collapse<?php echo $oObjeto->getCodigo(); ?>">
                            <?php 
                                echo "<strong>{$oObjeto->getCodigo()}</strong> - {$oObjeto->getCompanyName()}"; 
                            ?>
                            </button>
                        </h2>
                    </div>

                    <div id="collapse<?php echo $oObjeto->getCodigo(); ?>" class="collapse" aria-labelledby="<?php echo $oObjeto->getCodigo(); ?>" data-parent="#accordionExample">
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th scope="row" class="th-first">Código</th>
                                        <td><?php echo $oObjeto->getCodigo(); ?></td>
                                    </tr>

                                    <tr>
                                        <th scope="row" class="th-first">Empresa</th>
                                        <td><?php echo $oObjeto->getCompanyName(); ?></td>
                                    </tr>

                                    <tr>
                                        <th scope="row" class="th-first">Nome do Contato</th>
                                        <td><?php echo $oObjeto->getContactName(); ?></td>
                                    </tr>

                                    <tr>
                                        <th scope="row" class="th-first">Título do Contato</th>
                                        <td><?php echo $oObjeto->getContactTitle(); ?></td>
                                    </tr>

                                    <tr>
                                        <th scope="row" class="th-first">Endereço</th>
                                        <td><?php echo $oObjeto->getAddress(); ?></td>
                                    </tr>

                                    <tr>
                                        <th scope="row" class="th-first">Cidade</th>
                                        <td><?php echo $oObjeto->getCity(); ?></td>
                                    </tr>

                                    <tr>
                                        <th scope="row" class="th-first">Região</th>
                                        <td><?php echo $oObjeto->getRegion(); ?></td>
                                    </tr>

                                    <tr>
                                        <th scope="row" class="th-first">CEP</th>
                                        <td><?php echo $oObjeto->getPostalCode(); ?></td>
                                    </tr>

                                    <tr>
                                        <th scope="row" class="th-first">País</th>
                                        <td><?php echo $oObjeto->getCountry(); ?></td>
                                    </tr>

                                    <tr>
                                        <th scope="row" class="th-first">Telefone</th>
                                        <td><?php echo $oObjeto->getPhone(); ?></td>
                                    </tr>

                                    <tr>
                                        <th scope="row" class="th-first">Fax</th>
                                        <td><?php echo $oObjeto->getFax(); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <br>
                            <p>Ações disponíveis:</p>
                            <a href='' class="green">
                                <span class="btn btn-outline-primary">Alterar 
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg>
                                </span>
                            </a>                        
                            <a href='' class="red">
                                <span class="btn btn-outline-danger">Excluir
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                    </svg>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                    
                     
                            
                      
                        <?php
                        
                    
                }                
            }
        }
    }
?>