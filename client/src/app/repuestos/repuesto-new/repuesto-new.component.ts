import { Component, OnInit } from '@angular/core';
import { FormGroup, FormBuilder, Validators } from '@angular/forms';
import { Repuesto } from '../../shared/repuesto';
import { ActivatedRoute, Router } from '@angular/router';
import { RepuestoService } from '../../core/repuesto.service';

@Component({
  selector: 'app-repuesto-new',
  templateUrl: './repuesto-new.component.html',
  styleUrls: ['./repuesto-new.component.css'],
})
export class RepuestoNewComponent implements OnInit {
  pageTitle = 'Repuesto New';
  errorMessage: string = '';
  repuestoForm: any;

  prodId: number = 0;
  repuesto: Repuesto = {
    id: 0,
    name: '',
    model: '',
    description: '',
    price: 0,
    category: '',
    image: '',
  };

  constructor(
    private fb: FormBuilder,
    private activatedroute: ActivatedRoute,
    private router: Router,
    private repuestoService: RepuestoService
  ) {}

  ngOnInit(): void {
    this.repuestoForm = this.fb.group({
      name: [
        '',
        [
          Validators.required,
          Validators.minLength(3),
          Validators.maxLength(50),
        ],
      ],
      model: '',
      description: '',
      price: '',
      category: '',
      image: '',
    });

    // Read the repuesto Id from the route parameter
    this.prodId = parseInt(this.activatedroute.snapshot.params['repuestoId']);
  }

  saveRepuesto(): void {
    if (this.repuestoForm.valid) {
      if (this.repuestoForm.dirty) {
        this.repuesto = this.repuestoForm.value;
        this.repuesto.id = this.prodId;

        this.repuestoService.createRepuesto(this.repuesto).subscribe(
          () => this.onSaveComplete(),
          (error: any) => (this.errorMessage = <any>error)
        );
      } else {
        this.onSaveComplete();
      }
    } else {
      this.errorMessage = 'Hay errores en la validación de los campos, porfavor corrígelo antes de guardar.';
    }
  }

  onSaveComplete(): void {
    // Reset the form to clear the flags
    this.repuestoForm.reset();
    this.router.navigate(['']);
  }
}
