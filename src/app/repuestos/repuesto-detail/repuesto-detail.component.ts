import { Component, OnInit } from '@angular/core';
import { RepuestoService } from '../../core/repuesto.service';
import { Repuesto } from '../../shared/repuesto';
import { ActivatedRoute, Router } from '@angular/router';

@Component({
  selector: 'app-repuesto-detail',
  templateUrl: './repuesto-detail.component.html',
  styleUrls: ['./repuesto-detail.component.css'],
})
export class RepuestoDetailComponent implements OnInit {
  repuesto: Repuesto = {
    id: 0,
    title: '',
    price: 0,
    shortDescription: '',
    description: '',
    categories: [''],
    image: '',
  };
  prodId: number = 0;

  constructor(
    private activatedroute: ActivatedRoute,
    private router: Router,
    private repuestoService: RepuestoService
  ) {}

  ngOnInit() {
    this.prodId = parseInt(this.activatedroute.snapshot.params['repuestoId']);
    this.repuestoService
      .getRepuestoById(this.prodId)
      .subscribe((data: Repuesto) => (this.repuesto = data));
  }
  goEdit(): void {
    this.router.navigate(['/repuestos', this.prodId, 'edit']);
  }
  onBack(): void {
    this.router.navigate(['']);
  }
}
