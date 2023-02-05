import { InMemoryDbService } from 'angular-in-memory-web-api';

export class RepuestoData implements InMemoryDbService {
  createDb() {
    let repuestos = [
      {
        id: 0,
        title: 'Frenos',
        price: 24.99,
        shortDescription: 'This is a short description of the First Repuesto',
        description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
        category: 'electronics',
        image: 'https://via.placeholder.com/500x400',
      },
      {
        id: 1,
        title: 'Matricula',
        price: 64.99,
        shortDescription: 'This is a short description of the Second Repuesto',
        description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
        category: 'books',
        image: 'https://via.placeholder.com/500x400',
      },
      {
        id: 2,
        title: 'Suspension',
        price: 74.99,
        shortDescription: 'This is a short description of the Third Repuesto',
        description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
        category: 'electronics',
        image: 'https://via.placeholder.com/500x400',
      },
      {
        id: 3,
        title: 'Retrovisor',
        price: 84.99,
        shortDescription: 'This is a short description of the Fourth Repuesto',
        description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
        category: 'hardware',
        image: 'https://via.placeholder.com/500x400',
      },
      {
        id: 4,
        title: 'Puerta',
        price: 94.99,
        shortDescription: 'This is a short description of the Fifth Repuesto',
        description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
        category: 'electronics',
        image: 'https://via.placeholder.com/500x400',
      },
      {
        id: 5,
        title: 'Parabrisas',
        price: 54.99,
        shortDescription: 'This is a short description of the Sixth Repuesto',
        description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
        category: 'books',
        image: 'https://via.placeholder.com/500x400',
      },
      {
        id: 6,
        title: 'Chasis',
        price: 54.99,
        shortDescription: 'This is a short description of the Sixth Repuesto',
        description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
        category: 'books',
        image: 'https://via.placeholder.com/500x400',
      },
      {
        id: 7,
        title: 'Luna trasera',
        price: 54.99,
        shortDescription: 'This is a short description of the Sixth Repuesto',
        description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
        category: 'books',
        image: 'https://via.placeholder.com/500x400',
      },
      {
        id: 8,
        title: 'Asiento',
        price: 54.99,
        shortDescription: 'This is a short description of the Sixth Repuesto',
        description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
        category: 'books',
        image: 'https://via.placeholder.com/500x400',
      },
    ];
    return { repuestos: repuestos };
  }
}
